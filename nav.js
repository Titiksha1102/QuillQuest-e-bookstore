const createNav = () => {
    let nav = document.querySelector('.navbar');

    nav.innerHTML = `
    
   <div class="nav">   
    <img src="images/Pratik-1 crppd.png" class="brand-logo" alt="">
    <div class="nav-items">
        <div class="search">
            <input type="text" class="search-box" placeholder="search books...">
            <button class="search-btn">search</button>
        </div>
        <a href="login.html"><img src="images/account.png" alt=""></a>
        <a href="#"><img src="images/shopping-cart.png" alt=""></a>
    </div>
   </div>
<ul class="links-container">
    <li class="link-item"><a href="#" class="link">home</a></li>
    <li class="link-item"><a href="#" class="link">sell books</a></li>
    <li class="link-item"><a href="#" class="link">rent books</a></li>
    <li class="link-item"><a href="#" class="link">partner with us</a></li>
    
</ul>
    `;
}

createNav();