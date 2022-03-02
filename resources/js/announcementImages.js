$(function () {
    if ($("#drophere").length > 0) {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
      var myDropzone = new Dropzone('#drophere', {
        url: '/announcements/images/upload',
        params: {
          _token: csrfToken,
          uniqueSecret: uniqueSecret
        },
        addRemoveLinks: true,
        init: function init() {
          $.ajax({
            type: 'GET',
            url: '/announcements/images',
            data: {
              uniqueSecret: uniqueSecret
            },
            dataType: 'json'
          }).done(function (data) {
            $.each(data, function (key, value) {
              var file = {
                serverId: value.id
              };
              myDropzone.options.addedfile.call(myDropzone, file);
              myDropzone.options.thumbnail.call(myDropzone, file, value.src);
            });
          });
        }
      });
      myDropzone.on("success", function (file, response) {
        file.serverId = response.id;
      });
      myDropzone.on("removedfile", function (file) {
        $.ajax({
          type: 'DELETE',
          url: '/announcements/images/remove',
          data: {
            _token: csrfToken,
            id: file.serverId,
            uniqueSecret: uniqueSecret
          },
          dataType: 'json'
        });
      });
    }
  });