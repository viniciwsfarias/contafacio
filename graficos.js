
var ctx = document.getElementById("myChart");
var x = document.getElementById("azul").value;
console.log(x);
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [33, 33, 33],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
jQuery(document).ready(function(){
var idArray = [];
  jQuery('.casestudylink').on("click", function() {
    var postid = $(this).data('postid'),
    backgroundColor = $(this).css('background-color'),
    postClicked = $('.js-expanded-post-' + postid),
    caseExpand = $('.js-case-expand'),
    bodyWidth = $('body').css('width'),
    bodyHeight = $('body').css('height'),
    top = 0,
    //grab position of postExpand
    rectTop = this.getBoundingClientRect().top,
    rectLeft = this.getBoundingClientRect().left,
    rectWidth = this.getBoundingClientRect().width,
    rectHeight = this.getBoundingClientRect().height;
    console.log(bodyWidth);

      //grab scroll offset
      var offset = window.pageYOffset;
      rectTop += offset,
      top += offset;

      //move/resize caseExpand div
      $(caseExpand).css("display", "block");
      $(caseExpand).css("top", rectTop);
      $(caseExpand).css("left", rectLeft);
      $(caseExpand).css("width", rectWidth);
      $(caseExpand).css("height", rectHeight);

      //play timeline for content expansion
      expandTimeline(backgroundColor, caseExpand, bodyWidth, bodyHeight, top);

      });
});

/* =========================================
╔═╗╦  ╦╔═╗╦╔═  ╔═╗═╗ ╦╔═╗╔═╗╔╗╔╔╦╗
║  ║  ║║  ╠╩╗  ║╣ ╔╩╦╝╠═╝╠═╣║║║ ║║
╚═╝╩═╝╩╚═╝╩ ╩  ╚═╝╩ ╚═╩  ╩ ╩╝╚╝═╩╝ CLICK EXPAND
========================================= */

function expandTimeline(color, caseExpand, width, height, top) {
  //get close button
  var closeButton = document.getElementsByClassName('js-post-close'),
  body = document.getElementsByClassName("page");

  var expandTl = new TimelineMax();
  //tween z-index of caseExpand and expand fullscreen
  expandTl.set(caseExpand, {zIndex: 100, backgroundColor: color})
          .set("body", {overflow: "hidden"})
          .to(caseExpand, 0.5, {opacity: 1})
          .to(caseExpand, 1, {width: width, height: "100%", top: top, left: 0,});

  closeButton[0].addEventListener('click', function() {
  expandTl.reverse();
  }, false);
};
