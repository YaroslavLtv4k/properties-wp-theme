# properties-wp-theme

<blockquote>
	I created a wordpress theme based on HTML template from internet, below you can see what part of theme did i make and how i did it
</blockquote>

<h2>Header:</h2>
<h3>header.php</h3>
<ul>
	<li>Custom logo with displaying Site title and tagline</li>
	<li>Registrate wp nav menu - Top Menu</li>
</ul>

<h2>Template Parts:</h2>
<h3>Offer Header</h3>
<ul>
	<li>Offer header is the template-part
		<ul>
			<li>I use ACF on every page that use Offer Heaader - so Title and Under Title texts are apply to be change</li>
		</ul>
	</li>
</ul>
<h3>Breadcrumbs</h3>
<ul>
	<li>Background image can be changed
		<ul>
			<li>If user didn't set an image - it will be default image</li>
		</ul>
	</li>
	<li>It uses a ready function Breadcrumbs - <pre>ecoverde_the_breadcrumb()</pre></li>
	<li>Displaying the title (not the same in property card)</li>
</ul>
<h3>Posts</h3>
<ul>
	<li>Posts are displayed with WP_Query with some arguments</li>
	<li>Type of Property depends on the taxonomy used <pre>$term->name</pre></li>
	<li>Price displaying depends of what type of property it is. Rent - $300 / mo, Sale - $300</li>
	<li>Almost every feature display only if it's not empty</li>
	<li>Max lenght of title is 50 letters, then '...'</li>
</ul>

<h2>Front Page</h2>
<h3>front-page.php</h3>
<ul>
	<li>Displaying h1 title of the page
		<ul>
			<li>Replace / with < / br > </li>
		</ul>
	</li>
	<li>Title Desc with ACF</li>
	<li>Main background image change with ACF 
		<ul>
			<li>If doesn't set - will be replace by default image</li>
		</ul>
	</li>
	<li><a href="#offer-header">Offer Header</a></li>
	<li><a href="#posts">Posts</a>
		<ul>
			<li>User can choose how many posts will be shown</li>
		</ul>
	</li>
</ul>

<h2>Category</h2>
<h3>templates/properties.php</h3>	
<ul>
	<li>This file is a template that you can choose in adding new page</li>
	<li><a href="#breadcrumbs">Breadcrumbs</a></li>
	<li><a href="#offer-header">Offer Header</a></li>
	<li>I thought if will be good idea to add tabs to filter post
		<ul>
			<li>I used isotope js file (AJAX filter that uses classes)</li>
			<li>It's only small issue with pagination, i find the solve, but it's with js - <a href="https://codepen.io/TimRizzo/details/ervrRq">Solve</a></li>
		</ul>
	</li>
	<li>Pagination</li>
</ul>

<h2>Property card page</h2>
<h3>single-property.php</h3>
<ul>
	<li>It's a Custom Post Type that also use Taxonomy. To make CPT i used CPT UI plugin</li>
	<li><a href="#breadcrumbs">Breadcrumbs</a>
		<ul>
			<li>I changed h1 and h2 tags because of SEO, people will search "The sky home", not "Property Details"</li>
		</ul>
	</li>
	<li>Display Title (as the_title) and Description (as the_content)</li>
	<li>Other fields filled with ACF
		<ul>
			<li>Most of fields are not required, because it depends from what type of apartment it will be (for example: Flat, House, Sea House etc...</li>
			<li>I change html by removing bootstrap, insted of it i make width 33% and float left. In previous case if some feature is empty - it just will be hidden but will stay in the same column. Now if some of features is empty another feature will take its plase</li>
			<li>If description is empty people will see the message: "Oops, it's empty. You can return to the features tab"</li>
		</ul>
	</li>
</ul>


<h2>Footer</h2>
<h3>footer.php</h3>
<ul>
	<li>The entire footer is made up of widgets
		<ul>
			<li>All menu links are with icons, so i made a JS code after < /footer > on 23th line. If shortly: i add < span > tag with class of icon before < a > tag in < li > tag <pre>:)</pre> </li>
		</ul>
	</li>
	<li>Menu widgets are workable, you can click on every page</li>
</ul>


<h2>Pages</h2>
<h3>page.php</h3>
<ul>
	<li>You can see all the pages in footer. Here i use page.php file. Nothing special, breadcrumbs and content</li>
</ul>


<h2>Plugins that i used in my work</h2>
<h4>Higher i described how did i use them</h4>
<ul>
	<li>ACF</li>
	<li>CPT UI</li>
</ul>
