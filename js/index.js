document.getElementById("sign-up-link").addEventListener("click", () => {
  document.getElementById("sign-in-form").innerHTML = sign_up_content;
  document.getElementById("modal-title").textContent =
    "become part of our community by signing yourself up";
  document.getElementById("modal").classList.add("col-lg-10", "col-md-10");
});

let sign_up_content = `<form method="GET" action="index.php">
<div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 align-items-start">
    <div class="col">
       <div class="w-100">
            <label for="c_name">First Name</label>
            <input type="text" name="c_name" class="form-input" required>
            <span class="underline"></span>
        </div>

        <div class="w-100">
            <label for="c_email">Email</label>
            <input type="email" name="c_email" class="form-input" required>
            <span class="underline"></span>
        </div>

        <div class="w-100">
            <label for="c_pass">Password</label>
            <input type="password" name="c_pass" class="form-input" required>
            <span class="underline"></span>
        </div>
    
    </div>
    <div class="col">

        <div class="w-100">
            <label for="c_country" class="">Country</label>
            <select name="c_country" id="" class="form-input">
                <option value="">Select a Country</option>
                <option value="">Afghanistan</option>
                <option value="">India</option>
                <option value="">Japan</option>
                <option value="">Pakistan</option>
                <option value="">United states</option>
                <option value="">Russia</option>
                <option value="">Tajikistan</option>
                <option value="">united kingdom</option>
                <option value="">Iran</option>
                <option value="">Nepal</option>
            </select>
            <span class="underline"></span>
        </div>

        <div class="w-100">
            <label for="c_city">City</label>
            <input type="text" name="c_city" class="form-input" id="" required>
            <span class="underline"></span>
        </div>

        <div class="w-100">
            <label for="c_address">Address</label>
            <input type="text" name="c_address" class="form-input" >
            <span class="underline"></span>
        </div>

    </div>

    <div class="col">
        <div class="w-100">
            <label for="c_contact">Contact</label>
            <input type="text" name="c_contact" class="form-input" required>
            <span class="underline"></span>
        </div>

        <div class="mb-3">
            <label for="c_image" class="form-label">profile uploading</label>
            <input type="file" name="c_image" required class="form-control">
        </div>

        
    </div>
        
</div>
    
<div class="col-12">
    <button type="submit" name="register" class="btn col-12 btn-blue fw-bold fs-4">creat
        account</button>
</div>
</form>
            
`;


let x_mark = document.getElementById('x-mark')

// show and hide ==> signin modal
document.addEventListener("click", (e) => {
  if (e.target.id === "sign-in-btn") {
    document.getElementById("modal").classList.add("modal-activator");
    document.getElementById("scape").classList.remove("d-none");
  } else if (e.target.id === "scape" || e.target.id === "x-mark" || e.target.dataset.mark) {
    document.getElementById("modal").classList.remove("modal-activator");
    document.getElementById("scape").classList.add("d-none");
    document.getElementById("cart-modal").classList.remove("cart-activator");
  } else if (e.target.dataset.cart) {
    document.getElementById("cart-modal").classList.add("cart-activator");
    document.getElementById("scape").classList.remove("d-none");
  }
});
// dataset.cart === "cart-btn";




