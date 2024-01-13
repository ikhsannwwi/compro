@foreach ($comment as $row)
    <div class="comment-section">
        <div class="d-flex mb-4">
            <img src="https://bootdey.com/img/Content/avatar/avatar{{ mt_rand(1, 8) }}.png" class="img-fluid rounded"
                style="width: 45px; height: 45px;">
            <div class="ps-3">
                <h6><a href="">Anonymous</a>
                    <small><i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</i></small>
                </h6>
                <p>{{ $row->isi }}</p>
                <button class="btn btn-sm btn-light triggerReplay">Reply</button>
                <div class="panel sectionReply d-none">
                    <div class="panel-body">
                        <div class="col-12 form-messages">
                            <!-- Tempat untuk menampilkan pesan berhasil atau gagal -->
                        </div>
                        <textarea class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
                        <div class="mt-2 clearfix">
                            <a href="javascript:void(0)" data-id="{{ $row->id }}"
                                class="btn btn-sm btn-light triggerCommentReply"><i class="fas fa-pencil-alt"></i>
                                Share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($row->reply as $item)
            <div class="d-flex ms-5 mb-4">
                <img src="https://bootdey.com/img/Content/avatar/avatar{{ mt_rand(1, 8) }}.png"
                    class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href="">Anonymous</a>
                        <small><i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</i></small>
                    </h6>
                    <p>{{ $item->isi }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endforeach


<script type="text/javascript">
    $(document).ready(function() {
        // $('#triggerSubmitCommment').on('click', function(e) {
        //     e.preventDefault();

        //     var submitButton = $(this);

        //     if ($('#inputComment').val() != '') {
        //         // Disable the submit button and show loading state
        //         submitButton.prop('disabled', true).text('Submitting...');

        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('web.blog.slug.comment', $data->slug) }}",
        //             data: {
        //                 "_token": "{{ csrf_token() }}",
        //                 "_method": "POST",
        //                 "comment": $('#inputComment').val(),
        //             },
        //             success: function(respon) {
        //                 // Enable the submit button and restore its original text
        //                 submitButton.prop('disabled', false).text('Submit');
        //                 $('#countComment').text(respon.count);

        //                 $.ajax({
        //                     url: "{{ route('web.blog.fetchData.comment') }}",
        //                     data: {
        //                         slug: "{{ $data->slug }}"
        //                     },
        //                     success: function(data) {
        //                         $('#sectionCommentHtml').html(data);
        //                         $('#inputComment').val('')
        //                     },
        //                 });
        //             }
        //         });
        //     }
        // })

        $('.triggerCommentReply').on('click', function(e) {
            e.preventDefault();

            let submitButton = $(this);
            let originalText = submitButton.html();
            submitButton.prop('disabled', true).text('submiting...');


            var comment_id = $(this).data('id');

            // Find the closest comment section
            var commentSection = $(this).closest('.comment-section');

            // Find the textarea within the comment section
            var textarea = commentSection.find('.sectionReply textarea');

            commentSection.find(".form-messages").empty();

            textarea.prop('readonly', true);

            // Your code to handle the reply
            if (textarea.val() != '') {
                $.ajax({
                    type: "POST",
                    url: "{{ route('web.blog.slug.comment.reply', $data->slug) }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": "POST",
                        "comment": textarea.val(),
                        komentar_id: comment_id
                    },
                    success: function(respon) {
                        $('#countComment').text(respon.count);
                        $.ajax({
                            url: "{{ route('web.blog.fetchData.comment') }}",
                            data: {
                                slug: "{{ $data->slug }}",
                            },
                            success: function(data) {
                                $('#sectionCommentHtml').html(data);
                                textarea.val('');

                                submitButton.html(originalText).prop('disabled',
                                    false);

                                textarea.prop('readonly', false);
                                commentSection.find(".form-messages").html(
                                    '<div class="alert alert-success">Formulir berhasil dikirim!</div>'
                                );
                                setTimeout(function() {
                                    commentSection.find(
                                        ".form-messages").empty();
                                }, 10000);
                            },
                        });
                    }
                });
            } else {
                setTimeout(function() {
                    textarea.prop('readonly', false);

                    submitButton.html(originalText).prop('disabled', false);
                    commentSection.find(".form-messages").html(
                        '<div class="alert alert-danger">Formulir gagal dikirim. Silakan coba lagi!</div>'
                    );
                    setTimeout(function() {
                        commentSection.find(".form-messages").empty();
                    }, 10000);
                }, 2000);
            }
        });

        $('.triggerReplay').on('click', function() {
            var sectionReply = $(this).closest('.comment-section').find('.sectionReply');
            if (sectionReply.hasClass('d-none')) {
                sectionReply.removeClass('d-none');
            } else {
                sectionReply.addClass('d-none');
            }
        });
    });
</script>
