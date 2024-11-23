(function ($) {
  "use strict";

  //Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Sidebar Toggler
  $('.sidebar-toggler').click(function() {
    $('.sidebar, .content').toggleClass("open");
    return false;
  });



  // Chart Color
  Chart.defaults.color = "#6C7293";
  Chart.defaults.borderColor = "#000000";


  // Nationwide Sale Chart
  var ctx1 = $("#nationwide-sales").get(0).getContext("2d");
  var myChart1 = new Chart(ctx1, {
    type: "bar",
    data: {
      labels: ["2019", "2020", "2021", "2022", "2024", "2025"],
      datasets: [{
        label: "GREATER-ACCRA",
        data: [15, 30, 55, 65, 60, 80, 95],
        backgroundColor: "rgba(235, 22, 22, .7)"
      },
      {
        label: "ASHANTI",
        data: [8, 15, 40, 60, 70, 55, 75],
        backgroundColor: "rgba(235, 22, 22, .5)"
      },
      {
        label: "EASTERN",
        data: [12, 25, 45, 55, 65, 70, 60],
        backgroundColor: "rgba(235, 22, 22, .3)"
      },
      {
        label: "CENTRAL",
        data: [3, 25, 67, 39, 80, 65, 75],
        backgroundColor: "rgba(235, 22, 22, .1)"
      },
      {
        label: "WESTERN",
        data: [20, 15, 30, 60, 80, 85, 95],
        backgroundColor: "rgba(235, 22, 22, .5)"
      },
    ]
    },
    options: {
      responsive: true
    }
  });


  //Sales and Revenue Chart
  var ctx2 = $("#sales-revenue").get(0).getContext("2d");
  var myChart2 = new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["2019", "2020", "2021", "2022", "2024", "2025"],
      datasets: [{
        label: "Sales",
        data: [15, 30, 55, 45, 70, 65, 85],
        backgroundColor: "rgba(235, 22, 22, .7)",
        fill: true
      },
      {
        label: "Revenue",
        data: [99, 135, 170, 130, 190, 180, 270],
        backgroundColor: "rgba(235, 22, 22, .5)",
        fill: true
      }
    ]
    },
    options: {
      responsive: true
    }
  });


  // Calendar
  $("#calendar").datetimepicker({
    inline: true,
    format: "L",
  });

  //Back to top
  $(window).scroll(function(){
    if($(this).scrollTop() > 300) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
    return false
  })
})(jQuery);
