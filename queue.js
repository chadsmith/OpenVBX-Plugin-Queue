$(function() {
  $('.queue a').click(function() {
    $(this).parent().parent().siblings('.call').toggle();
    return false;
  });
  $('select').change(function() {
    var
      $call = $(this),
      $p = $call.parent().parent();
    $.ajax({
      type: 'POST',
      url: window.location,
      data: {
        sid: $(this).attr('name').match(/call_([A-z0-9]+)/)[1],
        flow: $(this).find('option:selected').val()
      },
      success: function() {
        $p.remove();
      },
      dataType: 'text'
    });
  });
});
