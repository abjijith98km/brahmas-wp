$(window).scroll(function () {
  if (window.scrollY > 240) {
    $("body").addClass("sticky_header");
  } else {
    $("body").removeClass("sticky_header");
  }
});
var thumbs = document.querySelectorAll(
  ".custom_course_details_page_block .coursr_detail_block .woocommerce-product-gallery.woocommerce-product-gallery--with-images.woocommerce-product-gallery--columns-4.images .woocommerce-product-gallery__image:not(:first-of-type)"
);
thumbs.forEach((item) =>
  item.addEventListener("click",function (e) {
    e.preventDefault();
    $(".custom_course_details_page_block .coursr_detail_block .woocommerce-product-gallery.woocommerce-product-gallery--with-images.woocommerce-product-gallery--columns-4.images .woocommerce-product-gallery__image:first-of-type a img").attr("src",`${$(item).find("img").attr("src")}`);
    $(".custom_course_details_page_block .coursr_detail_block .woocommerce-product-gallery.woocommerce-product-gallery--with-images.woocommerce-product-gallery--columns-4.images .woocommerce-product-gallery__image:first-of-type a").attr("href",`${$(item).find("img").attr("src")}`);
  })
);
