$(function (){
    $('#create-submit').on('click', function(){
      $.ajax({
      headers: {
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('article.analyze') }}",
      method: 'POST',
      data: {
        'id' : null,
        'text' : $('#text-create').val(),
      },
      dataType: 'json',
    })
    .done(function (data) {
      console.log('yes');
    })
    .fail(function () {
      console.log('failed');
    })
    });
});