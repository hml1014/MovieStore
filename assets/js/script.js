"use strict"
$(document).ready(function(){
  var base_url = 'http://washington.uww.edu/cs366/lehrhm14/project/';
  var cart = [];
  var mids = [];
  
// authenticate the session
  if (typeof localStorage.username != 'undefined'){
	// display user name
	$('#user').text(localStorage.username);
	// Display customer name 
	$('#customer-name, #acc-info, #shopping-cart').show();
	// hide sign out box
	$('#lg-box, #register-box').hide();
  }

  $('#sign-out').on('click', function(){
	// Hide customer info
	$('#customer-name, #acc-info, #shopping-cart').hide();
	// display sign in box
        $('#lg-box, #register-box').show();
	// clear local storage
	localStorage.removeItem('username');
	cart = [];
	updateShoppingCart();
  });

  $('#sign-in').on('click', function(){
	var username = $('#username').val();
	var pwd = $('#pwd').val();
	// define request data
	var thisRequestInfo = new RequestInfo('login', 'checkLogin', 'post');
	// define post data
	thisRequestInfo.data = 'username='+username + '&pwd='+ pwd;
	// define display method
	thisRequestInfo.displaymethod = displayLoginResult;
	// define HTML element
	thisRequestInfo.HTMLelementID = 'user';
	processRequest(thisRequestInfo);
  });

  // Define a constructor function to handle AJAX parameters
  var RequestInfo = function(controller, action,  method){
        this.controller = controller;
        this.action = action;
        this.method = method;
        this.data = null;
        this.parameter = '';
  };

  $('#allmovies').on('click', function(){
	resetEverything();
	$('#content-title').html("List of All Movies");
	var thisRequestInfo = new RequestInfo('movie', 'getFullMovieList', 'post');
	thisRequestInfo.displaymethod=displayPurchaseSet;
	thisRequestInfo.HTMLelementID = 'mlist';
	processRequest(thisRequestInfo);

  });

  $('#allratings').on('click', function(){
	resetEverything();
        $('#content-title').html("List of All Ratings");
        var thisRequestInfo = new RequestInfo('ratings', 'getFullRatingsList', 'post');
        thisRequestInfo.displaymethod=displayResultSet;
        thisRequestInfo.HTMLelementID = 'mlist';
        processRequest(thisRequestInfo);
  });

  $('#average-rating-filter').on('change', function(){
	var star = $('#average-rating-filter').val();
	$('#content-title').html("List of "+star+" Star Movies");
	var thisRequestInfo = new RequestInfo('movie', 'getAvgRatingList', 'post');
	thisRequestInfo.parameter = star;
	thisRequestInfo.displaymethod = displayPurchaseSet;
	thisRequestInfo.HTMLelementID = 'mlist';
	processRequest(thisRequestInfo);

  });

  $('#genre-filter').on('change', function(){
	var genre = $('#genre-filter').val();
	$('#content-title').html("List of "+genre+" Movies");
	var thisRequestInfo = new RequestInfo('movie', 'getMovieGenreList', 'post');
	thisRequestInfo.parameter = genre;
	thisRequestInfo.displaymethod = displayPurchaseSet;
	thisRequestInfo.HTMLelementID= 'mlist';
	processRequest(thisRequestInfo);
  });

  $('#rtsrchbutton').on('click', function(){
	var keyword = $('#rtsearch').val();
	$('#content-title').html("List of Ratings for Movies matching '"+keyword+"'");
	var thisRequestInfo = new RequestInfo('ratings', 'getTitleKeywordList', 'post');
        thisRequestInfo.parameter = keyword;
        thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

   $('#msrchbutton').on('click', function(){
        var keyword = $('#msearch').val();
        $('#content-title').html("List of Movies matching '"+keyword+"'");
        var thisRequestInfo = new RequestInfo('movie', 'getMovieTitleList', 'post');
        thisRequestInfo.parameter = keyword;
        thisRequestInfo.displaymethod = displayPurchaseSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

  $('#occupation-filter').on('change', function(){
	var occupation = $('#occupation-filter').val();
	$('#content-title').html("List of "+occupation+"'s Ratings");
	var thisRequestInfo = new RequestInfo('ratings', 'getOccupationList', 'post');
	thisRequestInfo.parameter=occupation;
	thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

  $('#ry-filter').on('change', function(){
	var year=$('#ry-filter').val();
	var title=$('#ry-filter option[value="'+year+'"]').text();
	$('#content-title').html("List of Ratings From "+title+" Movies");
	var thisRequestInfo = new RequestInfo('ratings', 'getYearList', 'post');
        thisRequestInfo.parameter=year;
        thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

   $('#year-filter').on('change', function(){
        var year=$('#year-filter').val();
        var title=$('#year-filter option[value="'+year+'"]').text();
        $('#content-title').html("List of Movies From "+title);
        var thisRequestInfo = new RequestInfo('movie', 'getMovieYearList', 'post');
        thisRequestInfo.parameter=year;
        thisRequestInfo.displaymethod = displayPurchaseSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

   $('#price-filter').on('change', function(){
        var price=$('#price-filter').val();
        var title=$('#price-filter option[value="'+price+'"]').text();
        $('#content-title').html("List of Movies Costing "+title);
        var thisRequestInfo = new RequestInfo('movie', 'getMoviePriceList', 'post');
        thisRequestInfo.parameter=price;
        thisRequestInfo.displaymethod = displayPurchaseSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });
	
  $('#star-filter').on('change', function(){
	var star=$('#star-filter').val();
	$('#content-title').html("List of "+star+" Star Ratings");
	 var thisRequestInfo = new RequestInfo('ratings', 'getStarRatingsList', 'post');
        thisRequestInfo.parameter=star;
        thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });


  $('#age-filter').on('change', function(){
        var age=$('#age-filter').val();
        var title=$('#age-filter option[value="'+age+'"]').text();
        $('#content-title').html("List of Ratings From Reviewers Aged "+title);
        var thisRequestInfo = new RequestInfo('ratings', 'getAgeList', 'post');
        thisRequestInfo.parameter=age;
        thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });


  $('#zipsrchbutton').on('click', function(){
        var keyword = $('#zipsearch').val();
        $('#content-title').html("List of Ratings for Reviewers with zipcode like '"+keyword+"'");
        var thisRequestInfo = new RequestInfo('ratings', 'getZipList', 'post');
        thisRequestInfo.parameter = keyword;
        thisRequestInfo.displaymethod = displayResultSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

  $('#history').on('click', function(){
	$('#content-title').html("Your purchase history");
	var thisRequestInfo = new RequestInfo('order', 'getHistoryList', 'post');
	thisRequestInfo.displaymethod = displayResultSet;
	thisRequestInfo.HTMLelementID = 'mlist';
	thisRequestInfo.parameter = localStorage.getItem('username');
	processRequest(thisRequestInfo);
  });

  $('#imdb').on('click', function(){
	$('#content-title').html("List of IMDb pages");
	var thisRequestInfo = new RequestInfo('movie', 'getLinkList', 'post');
	thisRequestInfo.displaymethod = displayResultSet;
	thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);
  });

  $('#style-filter').on('change', function(){
	var style = $('#style-filter').val();
	$('#content-title').html("List of Animated Kids Movies with "+style+" Animation");
	var thisRequestInfo = new RequestInfo('movie', 'getStyleList', 'post');
        thisRequestInfo.parameter = style;
        thisRequestInfo.displaymethod = displayPurchaseSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);

  });

  $('#company-filter').on('change', function(){
        var company = $('#company-filter').val();
        $('#content-title').html("List of Animated Kids Movies made by "+company);
        var thisRequestInfo = new RequestInfo('movie', 'getCompanyList', 'post');
        thisRequestInfo.parameter = company;
        thisRequestInfo.displaymethod = displayPurchaseSet;
        thisRequestInfo.HTMLelementID= 'mlist';
        processRequest(thisRequestInfo);

  });

  $('#register').on('click', function(){
	var username = $('#rusername').val();
	var password = $('#rpassword').val();
	if (username=='' | password==''){ alert('All fields must have a value!'); }
	else {
		var thisRequestInfo = new RequestInfo('order', 'registerUser', 'post');
		thisRequestInfo.data = {rusername:username, rpassword:password};
		thisRequestInfo.displaymethod = displayResultSet;
		thisRequestInfo.HTMLelementID= 'mlist';
        	processRequest(thisRequestInfo);
		$('#rusername').val('');
		$('#rpassword').val('');
		alert('Thanks for registering!');
	}	
  });

  // Private functions
   function CartItem(m_mid,m_title,m_price){
	this.mid=m_mid;
	this.title=m_title;
	this.price=m_price;
   }

   function resetEverything(){
	$('#average-rating-filter').val('0');
	$('#genre-filter').val('0');
   }

   function processRequest(request_data){
	/* request_data object contains all the necessary data for the AJAX request */
	// define url
        var url = base_url + request_data.controller;
        if (typeof request_data.action !== 'undefined' && request_data.action !== '')
                url +=   '/' + request_data.action ;
        if (typeof request_data.parameter !== 'undefined' && request_data.parameter !== '')
                url += '/'+ request_data.parameter;
        $.ajax({
                method : request_data.method, // request method: GET or POST
                url : url,
                data : request_data.data,     // POST data: 
                dataType : 'json',
                success : function(response){
			console.log(response);
			// define the object's display method
                        request_data.displaymethod(response, request_data.HTMLelementID);
			
                },
                error : function(response){
			console.log(response);
                }
        });
   }

  function displayLoginResult(data, elm){
	// display name of the user
	if (data != false){
		var name = 'Welcome, ' + data.username;
		$('#user').text(name);
		// display username
		$('#customer-name, #acc-info, #shopping-cart').show();
		// hide the login info
		$('#lg-box, #register-box').hide();
	/* Use local storage to store user id and name.
	   Use the syntax 
		localStorage.key = value;
	   to store a key=value pair using HTML5 localStorage.
        */
		localStorage.username = data.username;
        }else { alert('Wrong username or password'); }
  }

  function displayResultSet(data, elm){
	/* This method uses 'data' to create a table. 
	    This table replaces the HTML content of the element identified by the id 'elm'
	*/
	if (typeof data != 'undefined' && data.length>0){
		var msg = "";
		for (var i=0; i<data.length; i++){
			msg += "<tr>";
			// Obtain properties of each object. Properties are the column labels of the result set.
			var columns = Object.keys(data[i]);
			for (var j=0; j<columns.length; j++) 
				msg += "<td>" + data[i][columns[j]] + "</td>";
			msg += "</tr>";
		}
		$('#'+elm).html(msg);
  	}else { $('#'+elm).html('<h4>No results found.</h4>'); }
	
  }

 function displayPurchaseSet(data, elm){
        /* This method uses 'data' to create a table.
            This table replaces the HTML content of the element identified by the id 'elm'
        */
        if (typeof data != 'undefined' && data.length>0){
		var msg ="";
                for (var i=0; i<data.length; i++){
                	msg += "<tr data-index='" +i+ "' >";
			msg += "<td class='title'>"+data[i].title + "</td>";
			msg += "<td class='price'>$"+data[i].price + "</td>";
			msg += "<td><button type='button' class='buy-item' data-mid="+data[i].mid+" data-title='"+data[i].title+"' data-price="+data[i].price+">Buy</button></td></tr>"; 
                }
                $('#'+elm).html(msg);
        }else { $('#'+elm).html('<h4>No results found.</h4>'); }
  } 

  $('#mlist').on('click','.buy-item', function(){
	if (typeof localStorage.username == 'undefined') { alert('Please sign in to purchase our products!');}
  	else {
		var mid = $(this).data('mid');
		var title = $(this).data('title');
		var price = $(this).data('price');
		var thing = new CartItem(mid,title,price);
		cart.push(thing);
		updateShoppingCart();
	}
   });

   $('#shopcart').on('click', '.delete-item',function(){
        var index = $(this).val();
        deleteItemFromCart(index);
   });

   $('#purchase').on('click', function(){
	if (typeof localStorage.username == 'undefined') { alert('Please sign in to purchase our products!');}
	else if (cart.length==0) { alert('Your cart is empty.');}
	else {
		//var mids = [];
		var total = 0;
		for (var i=0; i<cart.length; i++){
			var mid = cart[i].mid;
			mids[i] = mid;
                	var cost = cart[i].price;
                	total += cost;
        	}
	        var username = localStorage.getItem('username');
		var thisRequestInfo = new RequestInfo('order','purchase','post');		
		thisRequestInfo.data = {username:username,total:total};
		thisRequestInfo.parameter = total;
        	thisRequestInfo.displaymethod = displayResultSet;
        	thisRequestInfo.HTMLelementID = 'shopcart';
        	processRequest(thisRequestInfo);
		setTimeout(function() { insertItems(); }, 5000);
	//	for (var i=0; i<mids.length; i++){
	//		var tri2 = new RequestInfo('order','insert','post');
	//		var mid= mids[i];
	//		tri2.data = {mid:mid};
	//		tri2.parameter = mid;
	//		tri2.displaymethod = displayResultSet;
	//		tri2.HTMLelementID = 'shopcart';
	//		processRequest(tri2);
	//	}
       	//	cart = [];
        //	updateShoppingCart();	
	}
   });

   function insertItems(){
	 for (var i=0; i<mids.length; i++){
                        var tri2 = new RequestInfo('order','insert','post');
                        var mid= mids[i];
                        tri2.data = {mid:mid};
                        tri2.parameter = mid;
                        tri2.displaymethod = displayResultSet;
                        tri2.HTMLelementID = 'shopcart';
                        processRequest(tri2);
                }
                cart = [];
		mids = [];
                updateShoppingCart();
   }

   function updateShoppingCart(){
	displayShoppingCart();
	updateCost();
   }

 function displayShoppingCart(){
	var msg="";
	for (var i=0;i<cart.length;i++){
		msg += '<tr><td>'+cart[i].title+'</td><td>'+cart[i].price+'</td>';
		msg += '<td><button type="button" value="'+i+'" class="delete-item">Delete</button></td></tr>';
	}
	$('#shopcart').html(msg);
	
 } 

 function updateCost(){
	var total=0;
	for (var i=0; i<cart.length; i++){
		var cost = cart[i].price;
		total += cost;
	}
	$('#total-cost').html('$ ' + total);
 }

 function deleteItemFromCart(index){
        cart.splice(index, 1);
        updateShoppingCart();
 }

});
