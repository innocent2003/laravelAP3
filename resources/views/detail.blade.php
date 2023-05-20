

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="product-detail.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <style>
        * {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
  font-family: "Fira Sans", sans-serif;
}

/*class*/
.d-justify-center {
  display: flex;
  justify-content: center;
}

.d-flex-a-center {
  display: flex;
  justify-content: center;
  align-items: center;
}

.d-flex-warp {
  display: flex;
  flex-wrap: wrap;
}

.d-flex-between {
  display: flex;
  justify-content: space-between;
}

.d-flex-row {
  display: flex;
  flex-direction: row;
}

.d-flex-space-around {
  display: flex;
  justify-content: space-around;
}

.inline-block {
  display: inline-block;
}

.d-flex-right {
  display: flex;
  justify-content: right;
  align-items: center;
  width: 100%;
}

.d-flex-left {
  display: flex;
  justify-content: left;
  align-items: center;
  width: 100%;
}

.d-flex-space-around {
  display: flex;
  justify-content: space-around;
  width: 100%;
}

.d-flex-column {
  display: flex;
  flex-direction: column;
}

.d-flex {
  display: flex;
}

.d-absolute {
  position: absolute;
}

.align-center {
  text-align: center;
}

.a-0 {
  top: 0%;
  bottom: 0%;
  left: 0%;
  right: 0%;
}
.dis-none {
  display: none;
}
.dis-block {
  display: block;
  transition-delay: 0.25s;
}
/* product_detail------------------------------------- */
.container-pd-detail {
  padding: 100px;
}
.pd-detail {
  display: flex;
  flex-direction: row;
}
.pd-img {
  width: calc((8 / 12) * 100%);
  justify-content: space-between;
}
.pd-detail > div:last-child {
  width: calc((4 / 12) * 100%);
  padding: 10px 30px;
}
.pd-img {
  display: flex;
  flex-wrap: wrap;
}
.pd-img img {
  width: calc((6 / 12 * 100% - 20px));
  margin: 10px;
}
.pd-name {
  font-size: xx-large;
  margin-bottom: 18px;
}
.pd-rate {
  margin-bottom: 18px;
}
.pd-rate i,
.quantity-rate,
.pd-rate a {
  margin-right: 3px;
  font-size: medium;
}
.pd-rate a {
  color: rgb(77, 77, 77);
}
.quantity-rate {
  color: rgb(77, 77, 77);
}
.pd-price {
  font-size: x-large;
  margin-bottom: 36px;
}
.pd-color p {
  margin: 18px 0 12px 0;
  color: rgb(77, 77, 77);
}
.pd-color div {
  display: flex;
}
.input-color {
  display: block;
  position: relative;
  margin: 0 18px 12px 4px;
  height: 30px;
  width: 30px;
  cursor: pointer;
  font-size: 22px;
  user-select: none;
}
.input-color input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkmark1 {
  position: absolute;
  top: 0;
  left: 0;
  height: 30px;
  width: 30px;
  border-radius: 50%;
}
.checkmark1::after {
  content: "";
  border: 1px solid rgb(0, 0, 0);
  position: absolute;
  height: 36px;
  top: -4px;
  left: -4px;
  width: 36px;
  border-radius: 100%;
  display: none;
}

.input-color input:checked ~ .checkmark1::after {
  display: block;
}
.pd-size p {
  margin: 18px 0;
}
.input-size {
  /* display: block; */
  position: relative;
  margin: 0 18px 12px 0px;
  height: 50px;
  width: 100px;
  cursor: pointer;
  font-size: 22px;
  user-select: none;
  background-color: rgba(0, 0, 0, 0);
  border: 1px solid rgb(198, 198, 198);
  display: flex;
  align-items: center;
  justify-content: center;
}
.input-size input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkmark2 {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: medium;
  height: 50px;
  width: 100px;
  background-color: rgba(0, 0, 0, 0);
}
.input-size input:checked ~ .checkmark2 {
  background-color: rgb(0, 0, 0);
  color: white;
}
.pd-Quantity {
  position: relative;
  margin-right: 10px;
}
.pd-Quantity select {
  position: relative;
  background-color: rgba(0, 0, 0, 0);
  outline: none;
  height: 60px;
  width: 100px;

  color: rgb(108, 108, 108);
  padding: 30px 10px 10px 10px;
  /* z-index: 1; */A
}
.pd-Quantity::before {
  position: absolute;
  content: "Qty";
  width: 100px;
  height: 100px;
  /* background-color: aqua; */
  top: 10px;
  /* z-index: 2; */
  left: 10px;
}
.submit p {
  margin: 18px 0 12px 0;
  color: rgb(77, 77, 77);
}
.submit > div {
  display: flex;
}
.submit > div > button {
  background-color: black;
  color: white;
  outline: none;
  border: none;
  width: 300px;

  font-size: larger;
}
.submit > div > button:hover {
  background-color: rgb(58, 58, 58);
}

    </style>
  </head>
  <body>
  <div class="container">
   <div class="row">
       <div class="col-sm-6">

       </div>
       <div class="col-sm-6">
           <a href="/">Go Back</a>
       <h2>{{$product['name']}}</h2>
       <h3>Price : {{$product['price']}}</h3>
       <h4>Details: {{$product['description']}}</h4>
       <h4>category: {{$product['category_id']}}</h4>
       <br><br>
       <form action="/add_to_cart" method="POST">
           @csrf
        <input type="hidden" name="product_id" value={{$product['id']}}>
       <button class="btn btn-primary">Add to Cart</button>
       </form>
       <br><br>
       <button class="btn btn-success">Buy Now</button>
       <br><br>




       <br><br>
    </div>
   </div>
</div>

    <main class="container-pd-detail">
      <div class="pd-detail">
        <div class="pd-img">
          <!-- thêm ảnh vào đây -->
          <img

              src="{{asset('storage/photos/'.$product['photo1'])}}"
              alt="wave"
            />
            <img

              src="{{asset('storage/photos/'.$product['photo2'])}}"
              alt="wave"
            />
            <img

              src="{{asset('storage/photos/'.$product['photo3'])}}"
              alt="wave"
            />
            <img

              src="{{asset('storage/photos/'.$product['photo4'])}}"
              alt="wave"
            />
          <!-- thêm ảnh vào đây -->
        </div>
        <div>
          <div class="pd-name"><b> {{$product['name']}} </b></div>
          <div class="pd-rate">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
            ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
            ><i class="fa-solid fa-star"></i>
            <span class="quantity-rate">(1)</span>
            <a href="">Question and Answers</a>
          </div>
          <div class="pd-price">{{$product['price']}}</div>
          <form action="">
            <div class="pd-color">
              <p>Color</p>
              <p>{{$product['description']}}</p>
              <div>
                <!-- Chô for màu  -->
                <label class="input-color">
                  <input type="radio" name="color" />
                  <span
                    class="checkmark1"
                    style="background-color: black"
                  ></span>
                </label>
                <label class="input-color">
                  <input type="radio" name="color" />
                  <span class="checkmark1" style="background-color: red"></span>
                </label>
                <!-- Chô for màu  -->
              </div>
            </div>
            <div class="pd-size">
              <p>Select Size</p>

              <div class="d-flex">
                <!-- chỗ for size  -->
                <label class="input-size">
                  <input type="radio" name="size" />

                  <span class="checkmark2">30</span>
                </label>
                <label class="input-size">
                  <input type="radio" name="size" />

                  <span class="checkmark2">35</span>
                </label>
                <label class="input-size">
                  <input type="radio" name="size" />

                  <span class="checkmark2">36</span>
                </label>
                <!-- chỗ for size  -->
              </div>
            </div>
            <form action="/add_to_cart" method="POST">
           @csrf
        <input type="hidden" name="product_id" value={{$product['id']}}>
       <button type="submit">Add to Cart</button>
       </form>
            <div class="submit">
              <p>In Stock</p>
              <div>
                <div class="pd-Quantity">
                  <select id="Quantity" name="Quantity">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">4</option>
                  </select>
                </div>
                <button type="submit">Add to Bag</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>






