class Product {
  constructor(imageUrl, transitionImage, price, title) {
    this.imageUrl = imageUrl;
    this.transitionImage = transitionImage;
    this.price = price;
    this.title = title;
  }
}

const products = {
  productList: [
    new Product(
      "img/products/productFive.jpg",
      "img/products/productSix.jpg",
      25.9,
      "Shoes"
    ),
    new Product(
      "img/products/productTwojpg.jpg",
      "img/products/productSeven.jpg",
      45,
      "Socks"
    ),

    new Product(
      "img/products/productEight.jpg",
      "img/products/printed-chiffon-dress.jpg",
      75.5,
      "Dress"
    ),

    new Product(
      "img/products/productTen.jpg",
      "img/products/productSix.jpg",
      75.5,
      "Sportswear"
    ),
  ],

  productRender() {
    const row = document.getElementById("newProducts");

    for (const prod of this.productList) {
      const col = document.createElement("div");
      let classesTodAdd = ["col-12", "col-sm-6", "col-lg-3"];
      col.classList.add(...classesTodAdd);
      console.log(prod.title);
      col.innerHTML = `
        <div class="imageInfoCon">
                <div class="imgOverlays imgTransition">
                  <img
                    src="${prod.imageUrl}"
                    alt="product One img"
                  />
                  <img
                    src="${prod.transitionImage}"
                    alt="product One Alternative image"
                    class="imgTransition__img"
                  />
                </div>
                <div class="imgInfo__item">
                  <p>${prod.title}</p>

                  <div
                    class="imgInfo__cartInfo d-flex justify-content-between pl-3 align-items-center"
                  >
                    <span>${prod.price}</span>
                    <span class="imgInfo__cardInfoIcon pr-3">
                      <i class="fas fa-shopping-cart"></i>
                    </span>
                  </div>
                </div>
        </div>
      
      `;
      console.log(col);
      row.append(col);
    }
  },
};

products.productRender();
