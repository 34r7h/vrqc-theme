<footer>
   <div class="container">
    <div class="row">
      <div class="col-xs-4 float2">
        <form id="newsletter" method="post" >
            <label>Newsletter</label>
            <div class="clearfix">
                <input type="text" onFocus="if(this.value =='Enter e-mail here' ) this.value=''" onBlur="if(this.value=='') this.value='Enter e-mail here'" value="Enter e-mail here" >
                <a href="#" onClick="document.getElementById('newsletter').submit()" class="btn btn_">subscribe</a>
            </div>
        </form>
    </div>
    <div class="col-xs-8 float">
      	<ul class="footer-menu">
        	<li><a href="index.html" class="current">Home Page</a>|</li>
            <li><a href="index-1.html">about</a>|</li>
            <li><a href="index-2.html">Services</a>|</li>
            <li><a href="index-3.html">collections</a>|</li>
            <li><a href="index-4.html">styles</a>|</li>
            <li><a href="index-5.html">Contacts</a></li>
        </ul>
      	Vacation Rentals Quebec City   &copy;  2015
      </div>
    </div>
   </div>
</footer>

<?php wp_footer();?>

</body>
</html>