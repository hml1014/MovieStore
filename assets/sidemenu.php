        <div class='col-xs-3 content'><!-- left section: content -->
		<div id='movie-links'>
		<h3><u>Movies</u></h3>
			<span id='allmovies' class='link'>List All Movies</span>
			<p></p>
			<p>Search for movies by title</p>
                        <input type="text" id='msearch' name="search" placeholder="Search..">
			<button type="button" id='msrchbutton'>Go</button>
			<p>Filter Movies by Average Rating</p>
		        <select id='average-rating-filter' name='average-rating' class='filters'>
          			<option value='0' selected='selected'>--select rating--</option>
				<option value='1'>1 Star</option>
          			<option value='2'>2 Stars</option>
          			<option value='3'>3 Stars</option>
          			<option value='4'>4 Stars</option>
				<option value='5'>5 Stars</option>
       			</select>
			<p>Filter Movies by Genre</p>
			<select id='genre-filter' name='movie-genre' class='filters'>
				<option value='0' selected='selected'>--select genre--</option>
				<option value='Action'>Action</option>
				<option value='Adventure'>Adventure</option>
				<option value='Animation'>Animation</option>
				<option value='Children&#39s'>Children's</option>
				<option value='Comedy'>Comedy</option>
				<option value='Crime'>Crime</option>
				<option value='Documentary'>Documentary</option>
				<option value='Drama'>Drama</option>
				<option value='Fantasy'>Fantasy</option>
				<option value='Film-Noir'>Film-Noir</option>
				<option value='Horror'>Horror</option>
				<option value='Musical'>Musical</option>
				<option value='Mystery'>Mystery</option>
				<option value='Romance'>Romance</option>
				<option value='Sci-Fi'>Sci-Fi</option>
				<option value='Thriller'>Thriller</option>
				<option value='War'>War</option>
				<option value='Western'>Western</option>
			</select>
   			<p>Filter Movies by Release Year</p>
                        <select id='year-filter' name='movie-year' class='filters'>
                                <option value='0' selected='selected'>--select year range--</option>
                                <option value='1920'>1920-1959</option>
                                <option value='1960'>1960-1979</option>
                                <option value='1980'>1980-1989</option>
                                <option value='1990'>1990-1994</option>
                                <option value='1995'>1995-1999</option>
                        </select>
			<p>Filter Movies by Price</p>
			<select id='price-filter' name='price' class='filters'>	
				<option value='0' selected='selected'>--select price range--</option>
                                <option value='6'>$6-$7.99</option>
                                <option value='8'>$8-$9.99</option>
                                <option value='10'>$10-$11.99</option>
			</select>
		<h3><u>Kids Animation</u></h3>
			<p>Filter Movies by Animation Style</p>
			<select id='style-filter' name='style' class='filters'>
				<option value='0' selected='selected'>--select animation style--</option>
				<option value='3D'>3D</option>
				<option value='2D'>2D</option>
				<option value='mixed'>mixed</option>
				<option value='claymation'>claymation</option>
			</select>
			<p>Filter Movies by Company</p>
			<select id='company-filter' name='company' class='filters'>
				<option value='0' selected='selected'>--select company--</option>
				<option value='Pixar'>Pixar</option>
				<option value='Disney'>Disney</option>
				<option value='Goldcrest'>Goldcrest</option>
				<option value='Sunbow'>Sunbow</option>
				<option value='Fox'>Fox</option>
				<option value='Warner Bros.'>Warner Bros.</option>
				<option value='Amblimation'>Amblimation</option>
				<option value='Nest Family Entertainment'>Nest Family Entertainment</option>
				<option value='Universal'>Universal</option>
				<option value='Clokey Films'>Clokey Films</option>
			</select>
		</div>

                <div id='rating-links'>
                <h3><u>View Ratings</u></h3>
			<span id='allratings' class='link'>List All Ratings</span>
			<p>Search for ratings by movie title</p>
			<input type="text" id='rtsearch' name="search" placeholder="Search..">
			<button type="button" id='rtsrchbutton'>Go</button>
			<p>Filter Ratings by Star Number</p>
			<select id='star-filter' name='stars' class='filters'>
				<option value='0' selected='selected'>--select stars==</option>
				<option value='1'>1 Star</option>
                                <option value='2'>2 Stars</option>
                                <option value='3'>3 Stars</option>
                                <option value='4'>4 Stars</option>
                                <option value='5'>5 Stars</option>
			</select>
			<p>Filter Ratings by Reviewer Occupation</p>
			<select id='occupation-filter' name='occupation' class='filters'>
				<option value='0' selected='selected'>--select occupation--</option>
				<option value='administrator'>Administrator</option>
				<option value='artist'>Artist</option>
				<option value='doctor'>Doctor</option>
				<option value='educator'>Educator</option>
				<option value='engineer'>Engineer</option>
				<option value='executive'>Executive</option>
				<option value='healthcare'>Healthcare</option>
				<option value='homemaker'>Homemaker</option>
				<option value='lawyer'>Lawyer</option>
				<option value='librarian'>Librarian</option>
				<option value='marketing'>Marketing</option>
				<option value='none'>None</option>
				<option value='other'>Other</option>
				<option value='programmer'>Programmer</option>
				<option value='retired'>Retired</option>
				<option value='salesman'>Salesman</option>
				<option value='scientist'>Scientist</option>
				<option value='student'>Student</option>
				<option value='technician'>Technician</option>
				<option value='writer'>Writer</option>
			</select>
			<p>Filter Ratings by Movie Release Year</p>
			<select id='ry-filter' name='rating-year' class='filters'>
				<option value='0' selected='selected'>--select year range--</option>
				<option value='1920'>1920-1959</option>
				<option value='1960'>1960-1979</option>
				<option value='1980'>1980-1989</option>
				<option value='1990'>1990-1994</option>
				<option value='1995'>1995-1999</option>
			</select>
			<p>Filter Ratings by Reviewer Age</p>
			<select id='age-filter' name='age-filter' class='filters'>
				<option value='0' selected='selected'>--select year range--</option>
                                <option value='1'>1-20</option>
                                <option value='21'>21-40</option>
                                <option value='41'>41-60</option>
                                <option value='61'>61-80</option>
			</select>	
			<p>Search for ratings by reviewer zipcode</p>
                        <input type="text" id='zipsearch' name="search" placeholder="Search..">
                        <button type="button" id='zipsrchbutton'>Go</button>
			
		</div>

		<div id='link-box'>
			<p></p>
			<p></p>
			<span id='imdb' class='link'>IMDb Links</span>
		</div>

                <div id='acc-info'>
                  <h4>My Account</h4>
                  <ul>
                        <li><span id='history' class='link'>Purchase history</span></li>
                  </ul>
                </div>


        </div><!-- end section -->

