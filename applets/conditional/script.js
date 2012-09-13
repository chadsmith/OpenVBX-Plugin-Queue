$(function() {
  $('.conditional-applet input[type="radio"]').live('click', function() {
    $(this)
      .closest('tr')
        .addClass('on')
        .removeClass('off')
      .siblings('tr')
        .removeClass('on')
        .addClass('off');
  });
});
