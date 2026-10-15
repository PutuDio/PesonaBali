<style>
/* You can also move this to public-style.css, but I'll keep it here for simplicity if the user had it here */
.footer{
	background-color: var(--dark-color);
    padding: 70px 0;
    margin-top: auto;
}
.footer-col{
	width: 25%;
	padding: 0 15px;
}
.footer-col h4{
	font-size: 20px;
	color: var(--white);
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 600;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: var(--primary-color);
	height: 3px;
    border-radius: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #bbbbbb;
	text-decoration: none;
	font-weight: 300;
	display: block;
	transition: var(--transition);
}
.footer-col ul li a:hover{
	color: var(--primary-color);
	padding-left: 8px;
}
.footer-col .social-links {
	display: flex;
	align-items: center; 
}
.footer-col .social-links a {
	margin: 0 15px 15px 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    width: 45px;
    background-color: rgba(255,255,255,0.05);
    border-radius: 50%;
    color: var(--white);
    transition: var(--transition);
}
.footer-col .social-links i {
  	font-size: 20px;
}
.footer-col .social-links a:hover {
	background-color: var(--primary-color);
    transform: translateY(-5px);
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
                    <li><a href="mailto:dioputu04@gmail.com">Email : dioputu04@gmail.com </a></li>
    				<li><a href="tel:+6281337366864">Phone : +6281337366864 </a></li>
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
                    <li><a href="index.php#about">About Bali</a></li>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const dropdown =
                document.getElementById("homeDropdown");

            function activateDropdown() {

                dropdown.classList.remove("active");

                let scrollPos = window.scrollY + 200;

                if (
                    scrollPos >= about.offsetTop &&
                    scrollPos < services.offsetTop
                ) {

                    dropdown.innerHTML = "About";
                    dropdown.classList.add("active");

                }
                else if (
                    scrollPos >= services.offsetTop
                ) {

                    dropdown.innerHTML = "Services";
                    dropdown.classList.add("active");

                }
                else {

                    dropdown.innerHTML = "Home";
                    dropdown.classList.add("active");

                }
            }

            window.addEventListener("scroll", activateDropdown);
            activateDropdown();
        });
        </script>
</body>
</html>
