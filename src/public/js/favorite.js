$(function() {
    let like = $('.like-toggle');
    let likeShopId;
    like.on('click', function() {
        let $this = $(this);
        likeShopId = $this.data('shop-id');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/favorite',
                method: 'POST',
                data: {
                    'shop_id': likeShopId
                },
            })

            .done(function(data) {
                $this.toggleClass('liked');
            })
            .fail(function() {
                console.log('fail');
            })
    })
})