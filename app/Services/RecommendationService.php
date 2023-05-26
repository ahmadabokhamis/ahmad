<?php
namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RecommendationService
{
    public function getRecommendedProducts(int $userId): Collection
    {
        $user = User::find($userId);
        $purchasedProducts = $user->orders()->with('products')->get()->pluck('products')->flatten();

        $collaborativeFilteredProducts = $this->getCollaborativeFilteredProducts($user, $purchasedProducts);
        $contentBasedFilteredProducts = $this->getContentBasedFilteredProducts($purchasedProducts);

        $recommendedProducts = $collaborativeFilteredProducts->merge($contentBasedFilteredProducts);

        return $recommendedProducts->unique('id')->sortByDesc('score')->take(10);
    }

    private function getCollaborativeFilteredProducts(User $user, Collection $purchasedProducts): Collection
    {
        // Implement collaborative filtering algorithm here
        // For example, you can use the k-nearest neighbors algorithm to find
        // similar users and recommend products that they have purchased


        // $similarUsers = User::where('id', '!=', $user->id)
        //     ->whereHas('orders', function ($query) use ($purchasedProducts) {
        //         $query->whereHas('products', function ($query) use ($purchasedProducts) {
        //             $query->whereIn('product_id', $purchasedProducts->pluck('id'));
        //         });
        //     })
        //     ->get();
        $recommendedProductsBatch = collect();


        $batchSize = 50; // Number of product IDs per batch
        $productIds = $purchasedProducts->pluck('id')->toArray();
        $totalProductIds = count($productIds);
        $recommendedProducts = collect();

        for ($i = 0; $i < $totalProductIds; $i += $batchSize) {
            $productIdsBatch = array_slice($productIds, $i, $batchSize);

            $similarUsers = User::where('id', '!=', $user->id)
                ->whereHas('orders', function ($query) use ($productIdsBatch) {
                    $query->whereHas('products', function ($query) use ($productIdsBatch) {
                        $query->whereIn('product_id', $productIdsBatch);
                    });
                })
                ->get();

            // Rest of the code to process similar users and recommended products

            // Merge recommended products from each batch
            $recommendedProducts = $recommendedProducts->merge($recommendedProductsBatch);
        }




        $recommendedProducts = collect();

        foreach ($similarUsers as $similarUser) {
            $similarUserPurchasedProducts = $similarUser->orders()->with('products')->get()->pluck('products')->flatten();

            $similarUserPurchasedProducts->each(function ($product) use ($recommendedProducts, $purchasedProducts, $similarUser) {
                if (!$purchasedProducts->contains($product)) {
                    $score = $similarUser->orders->where('status', 'complete')->count();
                    $recommendedProducts->push([
                        'product' => $product,
                        'score' => $score
                    ]);
                }
            });
        }
            // هون بصير عندي اكتر المواد شراء من قبل المستخدمين المشابهين

        return $recommendedProducts->groupBy('product.id')->map(function ($product) {
            return [
                'id' => $product[0]['product']['id'],
                'name' => $product[0]['product']['name'],
                'price' => $product[0]['product']['price'],
                'score' => $product->sum('score')
            ];
        });
    }

    private function getContentBasedFilteredProducts(Collection $purchasedProducts): Collection
    {
        // Implement content-based filtering algorithm here
        // For example, you can use the cosine similarity algorithm to find
        // products that are similar to the ones that the user has purchased

        $recommendedProducts = collect();

        foreach ($purchasedProducts as $purchasedProduct) {
            $categoryIds = $purchasedProduct->categories->pluck('id')->toArray();

            $similarProducts = Product::where('id', '!=', $purchasedProduct->id)
                ->where(function ($query) use ($categoryIds,$purchasedProduct) {
                    $query->whereHas('categories', function($qq)use($categoryIds){
                        $qq->WhereIn('category_id',$categoryIds);
                    })->orWhere('brand_id', $purchasedProduct->brand_id);
                })->with('product_order2',function($q){
                    $q->select('product_id', DB::raw('SUM(IFNULL(rate, 1) * 3) as score'))
                    ->groupBy('product_id');
                })->get();

                $similarProducts->each(function ($product) use ($recommendedProducts, $purchasedProduct) {
                    if (!$purchasedProduct->contains('id', $product->id)) {
                        $recommendedProducts->push([
                            'id' => $product->id,
                            'score' => $product->product_order2->score,
                        ]);
                    }
                });
        }

        return $recommendedProducts;
    }


    private function calculateContentBasedScore($product, Collection $purchasedProducts): float
    {
        $score = 0;

        $score = count($product->product_order2);

        // Add more attribute comparisons and score calculations as needed

        return $score;
    }

}
