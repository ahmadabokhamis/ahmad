/**
 * Dashboard Analytics
 */

'use strict';

(function () {
  let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------
  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: '2021',
          data: [18, 7, 15, 29, 18, 12, 9]
        },
        {
          name: '2020',
          data: [-13, -18, -9, -14, -5, -17, -15]
        }
      ],
      chart: {
        height: 300,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '33%',
          borderRadius: 12,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      colors: [config.colors.primary, config.colors.info],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
          height: 8,
          width: 8,
          radius: 12,
          offsetX: -3
        },
        labels: {
          colors: axisColor
        },
        itemMargin: {
          horizontal: 10
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: 0,
          bottom: -8,
          left: 20,
          right: 20
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 1580,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 1440,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '42%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1040,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 11,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 840,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '28%'
              }
            }
          }
        },
        {
          breakpoint: 640,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '37%'
              }
            }
          }
        },
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '45%'
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '52%'
              }
            }
          }
        },
        {
          breakpoint: 380,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '60%'
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [78],
      labels: ['Growth'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: cardColor,
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '600',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }

  // Profit Report Line Chart
  // --------------------------------------------------------------------
  const profileReportChartEl = document.querySelector('#profileReportChart'),
    profileReportChartConfig = {
      chart: {
        height: 80,
        // width: 175,
        type: 'line',
        toolbar: {
          show: false
        },
        dropShadow: {
          enabled: true,
          top: 10,
          left: 5,
          blur: 3,
          color: config.colors.warning,
          opacity: 0.15
        },
        sparkline: {
          enabled: true
        }
      },
      grid: {
        show: false,
        padding: {
          right: 8
        }
      },
      colors: [config.colors.warning],
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 5,
        curve: 'smooth'
      },
      series: [
        {
          data: [110, 270, 145, 245, 205, 285]
        }
      ],
      xaxis: {
        show: false,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        show: false
      }
    };
  if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
    const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
    profileReportChart.render();
  }

  // Order Statistics Chart
  // --------------------------------------------------------------------
//   const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
//       orderChartConfig = {
//       chart: {
//         height: 165,
//         width: 130,
//         type: 'donut'
//       },
//       labels: ['waiting driver','Delivered' ,'Delivery is in progress', 'Rejected', 'Received'],
//       series: [44, 55, 13, 33,55],
//       colors: [config.colors.primary, config.colors.success, config.colors.info, config.colors.danger , config.colors.secondary],
//       stroke: {
//         width: 5,

//       }, dataLabels: {
//         enabled: false,
//         formatter: function (val, opt) {
//           return parseInt(val) + '%';
//         }
//       },

//       legend: {
//         show: false
//       },

//       plotOptions: {
//         pie: {
//           donut: {
//             size: '75%',
//             labels: {
//               show: true,
//               value: {
//                 fontSize: '1.5rem',
//                 fontFamily: 'Public Sans',
//                 color: headingColor,
//                 offsetY: -15,
//                 formatter: function (val) {
//                   return parseInt(val) + '%';
//                 }
//               },
//               name: {
//                 offsetY: 20,
//                 fontFamily: 'Public Sans'
//               },
//               total: {
//                 show: true,
//                 fontSize: '0.8125rem',
//                 color: axisColor,
//                 label: 'Weekly',
//                 formatter: function (w) {
//                   return '38%';
//                 }
//               }
//             }
//           }
//         }
//       }
//     };
//   if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
//     const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
//     statisticsChart.render();
//   }
// $.ajax({
//     type: 'get',
//     url: "{{ url('/admin/order/status-counts') }}",
    
  
//   success: function(response) {
//     const statusCounts = response;

//     // Update the series data in the chart configuration
//     orderChartConfig.series = statusCounts.map(function(status) {
//       return status.count;
//     });

//     // Update the labels in the chart configuration
//     orderChartConfig.labels = statusCounts.map(function(status) {
//       return status.status;
//     });

//     // Render the chart
//   if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
//     const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
//     statisticsChart.render();
//   }
//   },
//   error: function(error) {
//     console.log(error);
//   }
// });



  const weeklyExpensesEl = document.querySelector('#expensesOfWeek'),
    weeklyExpensesConfig = {
      series: [65],
      chart: {
        width: 60,
        height: 60,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          startAngle: 0,
          endAngle: 360,
          strokeWidth: '8',
          hollow: {
            margin: 2,
            size: '45%'
          },
          track: {
            strokeWidth: '50%',
            background: borderColor
          },
          dataLabels: {
            show: true,
            name: {
              show: false
            },
            value: {
              formatter: function (val) {
                return '$' + parseInt(val);
              },
              offsetY: 5,
              color: '#697a8d',
              fontSize: '13px',
              show: true
            }
          }
        }
      },
      fill: {
        type: 'solid',
        colors: config.colors.primary
      },
      stroke: {
        lineCap: 'round'
      },
      grid: {
        padding: {
          top: -10,
          bottom: -15,
          left: -10,
          right: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
    const weeklyExpenses = new ApexCharts(weeklyExpensesEl, weeklyExpensesConfig);
    weeklyExpenses.render();
  }
  
  
  
  
  
  
  
  
//  const chart_lines = document.querySelector('#incomeChart')
//   ;
//   var today = new Date();
//   var month = today.getMonth() + 1; // add 1 because getMonth() returns 0-indexed months
//   var year = today.getFullYear();

//   // get number of days in current month
//   var daysInMonth = new Date(year, month, 0).getDate();

//   // generate categories array for current month
//   var categories = [];
//   for (var i = 1; i <= daysInMonth; i++) {
//      categories.push(month + '/' + (i < 10 ? '0' + i : i));
//   }
//   var options = {
//     series: [{
//       name: "Waiting driver",
//       data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10,50,40,78]
//     },
//     {
//       name: "Delivered",
//       data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35,20,30,5]
//     },
//     {
//       name: 'Delivery in progress',
//       data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47,10,40,5]
//     }
//     ,
//     {
//       name: 'Rejected',
//       data: [40, 55, 27, 13, 12, 10, 11,2, 9, 15, 80, 47,10,40,5]
//     }
//     ,
//     {
//       name: 'Received',
//       data: [40, 50, 30, 22, 10, 8, 9,3, 0, 17, 45, 47,10,40,5]
//     }
//   ],colors: [config.colors.primary, config.colors.success, config.colors.info, config.colors.danger , config.colors.secondary],
//     chart: {
//     height: 350,
//     type: 'line',
//     zoom: {
//       enabled: false
//     },
//   },
//   dataLabels: {
//     enabled: false
//   },
//   stroke: {
//     width: [3, 3, 3,3 ,3],
//     curve: 'smooth',

//   },
//   legend: {
//     tooltipHoverFormatter: function(val, opts) {
//       return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
//     }
//   },
//   markers: {
//     size: 0,
//     hover: {
//       sizeOffset: 6
//     }
//   },


//   xaxis: {
//     categories: categories,
//   },
//   tooltip: {
//     y: [
//       {
//         title: {
//           formatter: function (val) {
//             return val 
//           }
//         }
//       },
//       {
//         title: {
//           formatter: function (val) {
//             return val 
//           }
//         }
//       },
//       {
//         title: {
//           formatter: function (val) {
//             return val;
//           }
//         }
//       }
//     ]
//   },
//   grid: {
//     borderColor: '#f1f1f1',
//   }
//   };

//   var chart = new ApexCharts(chart_lines, options);
//   chart.render(); 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
})();
