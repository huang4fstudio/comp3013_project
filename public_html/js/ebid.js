//
// $(document).ready(function () {
//   $('#sortQuery').change(function () {
//      var valueSelected = this.value;
//
//      if(valueSelected=="priceHiLo"){
//        alert("Sort high low");
//        sortPriceHighLow($('#searchResults'), "div", "span.strong.itemPrice");
//      }
//      else if(valueSelected="priceLoHi"){
//        alert("Sort low high");
//        sortPriceLowHigh($('#searchResults'), "div", "span.strong.itemPrice");
//      }
//   });
// });
//
// function sortPriceLowHigh(parent, childSelector, keySelector) {
//     // var items = parent.children(childSelector).sort(function(a, b) {
//     //     var vA = $(keySelector, a).text();
//     //     var vB = $(keySelector, b).text();
//     //     return (vA < vB) ? -1 : (vA > vB) ? 1 : 0;
//     // });
//     // parent.empty();
//     // console.log(items);
//     // parent.append(items);
// }
//
// function sortPriceHighLow(parent, childSelector, keySelector) {
//     // var items = parent.children(childSelector).sort(function(a, b) {
//     //     var vA = $(keySelector, a).text();
//     //     var vB = $(keySelector, b).text();
//     //     return (vA > vB) ? -1 : (vA < vB) ? 1 : 0;
//     // });
//     // parent.empty();
//     // console.log(items);
//     // parent.append(items);
// }
function submitSortOrder(){
   sortForm.submit();
}

window.onload = function() {
  $('.input-group.date').datepicker({
    todayHighlight: true
  });
};

function countChar(val) {
   var len = val.value.length;
   if (len >= 500) {
     val.value = val.value.substring(0, 500);
   } else {
     $('#charNum').text(500 - len);
   }
 };
