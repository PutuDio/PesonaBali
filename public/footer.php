<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap'); /* Import font Poppins dari Google Fonts */
body{
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
}

*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}

.container{
	max-width: 1170px;
	margin:auto;
}

.row{
	display: flex;
	flex-wrap: wrap;
}

ul{
	list-style: none;
}

.footer{
	background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
	width: 25%;
	padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links {
	display: flex;
	align-items: center; 
}
.footer-col .social-links a {
	margin: 0 30px 30px 0;
}
.footer-col .social-links i {
  	font-size: 30px; /* Adjust the size as needed */
	color: #ffffff;
	transition: all 0.7s ease;
}
.footer-col .social-links a:hover i {
    display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.7s ease;
}

@media(max-width: 767px){
	.footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
	.footer-col{
    width: 100%;
}
}

</style>


<footer class="footer">
    <div class="container">
    	<div class="row">
			<!-- Kolom Contact Us -->
            <div class="footer-col">
                <h4>Contact Us</h4>
    			<ul>
                    <li><a href="#">Email : dioputu04@gmail.com </a></li>
    				<li><a href="#">Phone : +6281337366864 </a></li>
                </ul>
            </div>

			<!-- Kolom Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="../admin">Admin Page</a></li>
                    <li><a href="faqs.php">FAQs</a></li>
                </ul>
            </div>

			<!-- Kolom About -->
            <div class="footer-col">
                <h4>About</h4>
                <ul>
                    <li><a href="index.php #about">About Bali</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

			<!-- Kolom Follow Us dengan social media links -->
    		<div class="footer-col">
    			<h4>Follow Us</h4>
    			<div class="social-links">
    				<a href="#"><i class="fab fa-facebook-f"></i></a>
    				<a href="#"><i class="fab fa-twitter"></i></a>
    				<a href="#"><i class="fab fa-instagram"></i></a>
    				<a href="#"><i class="fab fa-linkedin-in"></i></a>
    			</div>
    		</div>
    	</div>
    </div>
</footer>


	<!-- Script untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
