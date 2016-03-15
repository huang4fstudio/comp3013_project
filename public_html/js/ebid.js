
 $(document).ready(function () {
   $('#sortQuery').change(function () {
      var valueSelected = this.value;

      if(valueSelected=="priceHiLo"){
        // alert("Sort high low");
        sortPriceHighLow($('#searchResults'), "div", "span > .itemPrice");
      }
      else if(valueSelected="priceLoHi"){
        // alert("Sort low high");
        sortPriceLowHigh($('#searchResults'), "div", "span > .itemPrice");
      }
   });
 });

 function sortPriceLowHigh(parent, childSelector, keySelector) {
      var items = parent.children(childSelector).sort(function(a, b) {
          var A= $(keySelector, a).text();  A = parseInt(A.toString().substring(1), 10);
          var B = $(keySelector, b).text(); B = parseInt(B.toString().substring(1), 10);
          return (A< B) ? -1 : (A> B) ? 1 : 0; //compare first element's price to second
      });
      parent.empty();
      console.log(items);
      parent.append(items);
 }

 function sortPriceHighLow(parent, childSelector, keySelector) {
      var items = parent.children(childSelector).sort(function(a, b) {
          var A= $(keySelector, a).text();  A = parseInt(A.toString().substring(1), 10);
          var B = $(keySelector, b).text(); B = parseInt(B.toString().substring(1), 10);
          return (A> B) ? -1 : (A< B) ? 1 : 0; //compare first element's price to second
      });
      parent.empty();
      console.log(items);
      parent.append(items);
 }
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
