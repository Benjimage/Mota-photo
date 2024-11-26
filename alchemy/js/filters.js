(function($){
var x = $(".custom-select");
  var l = x.length;

  for (var i = 0; i < l; i++) {
      var selElmnt = $(x[i]).find("select").first();
      var ll = selElmnt.find("option").length;

      var a = $("<div></div>").addClass("select-selected").html(selElmnt.find("option:selected").html());
      $(x[i]).append(a);

      var b = $("<div></div>").addClass("select-items select-hide");
      for (var j = 1; j < ll; j++) {
          var c = $("<div></div>").html(selElmnt.find("option").eq(j).html());
          c.on("click", function(e) {
              var s = $(this).parent().parent().find("select").first();
              var h = $(this).parent().prev();
              s.val($(this).html());
              h.html($(this).html());
              var y = $(this).parent().find(".same-as-selected");
              y.removeClass("same-as-selected");
              $(this).addClass("same-as-selected");
              h.click();
          });
          b.append(c);
      }
      $(x[i]).append(b);
      a.on("click", function(e) {
          e.stopPropagation();
          closeAllSelect(this);
          $(this).next().toggleClass("select-hide");
          $(this).toggleClass("select-arrow-active");
      });
  }

  function closeAllSelect(elmnt) {
      var x = $(".select-items");
      var y = $(".select-selected");
      var arrNo = [];
      y.each(function(i) {
          if (elmnt !== this) {
              $(this).removeClass("select-arrow-active");
          } else {
              arrNo.push(i);
          }
      });
      x.each(function(i) {
          if (arrNo.indexOf(i) === -1) {
              $(this).addClass("select-hide");
          }
      });
  }
 /*  console.log($('.select-selected').html());
  $('.select-selected').on('click', function(){
    $value = $('.select-selected').html();
    console.log($value)
  }) */
    $('.select-selected').each(function(){
        $(this).on('click', function(){
            console.log($('.select-selected').html());
        });
      });
})(jQuery);
