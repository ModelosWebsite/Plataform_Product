<style>
  /** FORMATION SCROLLBAR DA ÁREA DE MENU */
  .container-scroll {
 background: #ddd;
 max-width: 900px;
 border-radius: 30px;
 overflow: hidden;
 position: relative;
}

.container-scroll i {
 width: 40px;
 height: 40px;
 cursor: pointer;
 display: flex;
 align-items: center;
 justify-content: center;
 color: #333;
 border-radius: 50%;
 pointer-events: auto;
}

.container-scroll i:hover {
 background: var(--background);
 color: #fff;
}

.container-scroll ul {
 display: flex;
 gap: 16px;
 padding: 12px 24px;
 margin: 0;
 list-style: none;
 overflow-x: scroll;
 -ms-overflow-style: none;
 scrollbar-width: none;
 scroll-behavior: smooth;
}

.container-scroll ul.dragging {
 scroll-behavior: auto;
}

.container-scroll ul::-webkit-scrollbar {
 display: none;
}

.container-scroll button {
 color: #333;
 font-weight: 500;
 text-decoration: none;
 background: #fff;
 padding: 4px 24px;
 display: inline-block;
 border-radius: 30px;
 user-select: none;
 white-space: nowrap;
 transition: ease-in-out;
 border: none;
}

.container-scroll button:hover,
.container-scroll button.active {
 background: var(--background);
 color: #fff;
}

.iconChevron-left,
.iconChevron-right {
 position: absolute;
 height: 100%;
 width: 100px;
 top: 0;
 display: none;
 align-items: center;
 padding: 0 10px;
 pointer-events: none;
}

.iconChevron-left.active,
.iconChevron-right.active {
 display: flex;
} 

.iconChevron-right {
 right: 0;
 background: linear-gradient(to left, #ddd 50%, transparent);
 justify-content: flex-end;
}

.iconChevron-left {
 background: linear-gradient(to right, #ddd 50%, transparent);
}

.cartcout {
  position: fixed;
  width: 60px;
  height: 60px;
  bottom: 40px;
  right: 40px;
  background-color: #fafafa;
  color: #FFF;
  border-radius: 50px;
  text-align: center;
  font-size: 30px;
  box-shadow: 1px 1px 2px #888;
  z-index: 1000;
}

product-section {
padding: 7rem 0; 
}
.product-section .product-item {
text-align: center;
text-decoration: none;
display: block;
position: relative;
padding-bottom: 50px;
cursor: pointer; }
.product-section .product-item .product-thumbnail {
margin-bottom: 30px;
position: relative;
top: 0;
-webkit-transition: .3s all ease;
-o-transition: .3s all ease;
transition: .3s all ease; }
.product-section .product-item h3 {
font-weight: 600;
font-size: 16px; }
.product-section .product-item strong {
font-weight: 800 !important;
font-size: 18px !important; }
.product-section .product-item h3, .product-section .product-item strong {
color: #2f2f2f;
text-decoration: none; }
.product-section .product-item .icon-cross {
position: absolute;
width: 35px;
height: 35px;
display: inline-block;
background: #2f2f2f;
bottom: 15px;
left: 50%;
-webkit-transform: translateX(-50%);
-ms-transform: translateX(-50%);
transform: translateX(-50%);
margin-bottom: -17.5px;
border-radius: 50%;
opacity: 0;
visibility: hidden;
-webkit-transition: .3s all ease;
-o-transition: .3s all ease;
transition: .3s all ease; }
.product-section .product-item .icon-cross img {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%); }
.product-section .product-item:before {
bottom: 0;
left: 0;
right: 0;
position: absolute;
content: "";
background: #dce5e4;
height: 0%;
z-index: -1;
border-radius: 10px;
-webkit-transition: .3s all ease;
-o-transition: .3s all ease;
transition: .3s all ease; }
.product-section .product-item:hover .product-thumbnail {
top: -25px; }
.product-section .product-item:hover .icon-cross {
bottom: 0;
opacity: 1;
visibility: visible; }
.product-section .product-item:hover:before {
height: 70%; }
</style>