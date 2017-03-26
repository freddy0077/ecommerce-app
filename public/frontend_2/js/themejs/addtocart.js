/* -------------------------------------------------------------------------------- /
	
	Magentech jQuery
	Created by Magentech
	v1.0 - 20.9.2016
	All rights reserved.
	
/ -------------------------------------------------------------------------------- */

	// Cart add remove functions

	var watch = {

		'add': function(product_id, store_id,user_id) {

			$.post('/watch-shop/'+product_id+'/'+store_id+'/'+user_id,function(data){
				var image_url = data.image_url;
				if(data.status == 401) {
					addProductNotice('Sorry !', '', '<h3><a href="#">You have to Log in first to follow a shop !</h3>', 'error');
				}
				else if(data.status == 404) {
					addProductNotice('Sorry !', '', '<h3><a href="#">'+data.message+ '!</h3>', 'error');
				}

				else if(data.status == 403){
						addProductNotice('Sorry !', '', '<h3><a href="#">You can not follow your own shop !</h3>', 'error');

				}else {
					addProductNotice('Shop added to your feeds',
							'<img src='+image_url+'>',
							'<h3><a href="#">You are now watching </a>'+ data.store +'<a href="#"></a>!</h3>',
							'success');
				}


			})
		}
	}

	var likes = {

		'add': function(product_id) {

            $.post('/like-it/'+product_id,function(data){
                addProductNotice('',
                    '',
                    //'<img src="images/products/"'+product_id+' alt="">',
                    //'<h3><a href="#">Apple Cinema 30"</a> added to <a href="#">shopping cart</a>!</h3>',
                    '<h3><a href="#">'+data.message+'!</h3>',
                    'success');
                $('.like-counts-'+product_id).text(data.likes)
                $('#like-toggle-'+product_id).removeClass('fa fa-thumbs-up')

            });


		}
	}

	var cart = {

		'add': function (product_id, name, quantity, price) {
			$.post('/store/add-to-cart/' + product_id + '/' + name + '/' + quantity + '/' + price, function (data) {

				$('#shopping-cart').html(data);

				addProductNotice('Product added to Cart',
						//'<img src="images/products/"'+product_id+'.jpg' alt="">',
						'',
						'<h3><a href="#">' + name + '</a> added to <a href="#"> cart</a>!</h3>',
						'success');

			})

		},

		'remove': function (product_id) {
			$.post('/store/remove-from-cart/' + product_id, function (data) {

				$('#shopping-cart').html(data);

				addProductNotice('Product added to Cart',
						//'<img src="images/products/"'+product_id+'.jpg' alt="">',
						'',
						//'<h3><a href="#">'+name+'</a> added to <a href="#"> cart</a>!</h3>',
						'<h3><a href="#">an item</a> removed from <a href="#"> cart</a>!</h3>',
						'success');

			})

		},

		'confirmOrder': function () {
			var delivery = $('#delivery:checked').val() == undefined ? false: true;

			$.post('/store/check-out',function(data){

				addProductNotice('Successful',
						//'<img src="images/products/"'+product_id+'.jpg' alt="">',
						'',
						//'<h3><a href="#">'+name+'</a> added to <a href="#"> cart</a>!</h3>',
						'<h3><a href="#"></a> Ordered successfully !<a href="#"> </a>! redirecting...</h3>',
						'success');
				setTimeout(function(){
					location.href="/"
				},3000)
			})

		},

	}



	var fancy = {
		'add': function(product_id) {
            $.post('/fancy-it/'+product_id,function(data) {
                addProductNotice('Fancied !',
                    '',
                    '<h3>'+data.message+'!</h3>',
                    'success');

            });
		}
	}
	var compare = {
		'add': function(product_id) {
			addProductNotice('Product added to compare',
					'<img src="image/demo/shop/product/e11.jpg" alt="">',
					'<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
		}
	}

	/* ---------------------------------------------------
		jGrowl – jQuery alerts and message box
	-------------------------------------------------- */
	function addProductNotice(title, thumb, text, type) {
		$.jGrowl.defaults.closer = false;
		//Stop jGrowl
		//$.jGrowl.defaults.sticky = true;
		var tpl = thumb + '<h3>'+text+'</h3>';
		$.jGrowl(tpl, {
			life: 4000,
			header: title,
			speed: 'slow',
			theme: type
		});
	}

