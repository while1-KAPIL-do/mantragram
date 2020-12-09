     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pImg')
                        .attr('src', e.target.result)
                        .width(155)
                        .height(150)
                        .css("border-radius","30px");
                };

                reader.readAsDataURL(input.files[0]);
            }
        }