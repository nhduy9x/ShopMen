
// menu moblie
const iconBar  = document.querySelector('.fas.fa-bars');
const listMenu = document.querySelector('.list-inline.ul-parent');
const iconShowMenuChild = document.querySelectorAll('.fas.fa-angle-down');
const ulChild = document.querySelectorAll('.menu-ul-child');
iconBar.addEventListener('click',function(){
    listMenu.classList.toggle('menuMobile');
})
for(let i=0;i<iconShowMenuChild.length ; i++){
    iconShowMenuChild[i].addEventListener('click',function(){
        if(ulChild[i].className.indexOf('ulChildShow') !=-1){
            ulChild[i].classList.remove('ulChildShow');
        }else{
            for(let j=0;j<iconShowMenuChild.length ; j++){
                ulChild[j].classList.remove('ulChildShow');
            }
            ulChild[i].classList.add('ulChildShow');
        }
    })
}

// form search
const iconSearch = document.querySelector('.fas.fa-search');
const formSearch = document.querySelector('.form-search');
iconSearch.addEventListener('click',function(){
    formSearch.classList.toggle('form-show');
})




if(window.location.href.indexOf('product-detail') != -1){
const formColor = document.getElementById('fcolor');
const formSize = document.getElementById('fsize');
const formPrice = document.getElementById('fprice'); 
const pricesubmit = document.querySelectorAll('.pricesubmit');


const PriceRed = document.querySelectorAll('.product-single-price');
const size = document.querySelectorAll('.size');
const divStock = document.querySelectorAll('.div-stock');
const btnSize = document.querySelectorAll('.btn-size');
const pStock = document.querySelectorAll('.product-single-stock');
const btnColor = document.querySelectorAll('.btn-color');


formColor.value=btnColor[0].innerText;
formSize.value=btnSize[0].innerText;
formPrice.value=pricesubmit[0].innerHTML;

for(let i=0; i<btnSize.length; i++){
    btnSize[i].addEventListener('click',function(){
        for(let i =0; i< btnSize.length; i++){
            btnSize[i].classList.remove('active');
            pStock[i].classList.remove('active');
        }
        btnSize[i].classList.add('active');
        pStock[i].classList.add('active');
        formSize.value=btnSize[i].innerText;
    })
}

size[0].firstElementChild.classList.add('active');
divStock[0].firstElementChild.classList.add('active');
PriceRed[0].classList.add('active');
size[0].classList.add('active');
btnColor[0].classList.add('active');

for(let i=0; i<btnColor.length; i++){
    btnColor[i].addEventListener('click',function(){
        indexProductGallery = i;
        for(let i =0; i< btnColor.length; i++){
            PriceRed[i].classList.remove('active');
            size[i].classList.remove('active');
            btnColor[i].classList.remove('active');
            imgProductSlide[i].style.opacity=0;
        }
        for(let i =0; i< pStock.length; i++){
            btnSize[i].classList.remove('active');
            pStock[i].classList.remove('active');
        }
        formPrice.value=pricesubmit[indexProductGallery].innerHTML;
        formColor.value=btnColor[indexProductGallery].innerText;
        formSize.value=size[indexProductGallery].firstElementChild.innerText;

        size[i].firstElementChild.classList.add('active');
        divStock[i].firstElementChild.classList.add('active');
        imgProductSlide[indexProductGallery].style.opacity=1;
        PriceRed[indexProductGallery].classList.add('active');
        size[indexProductGallery].classList.add('active');
        btnColor[indexProductGallery].classList.add('active');
    })
}

    //tabpanel
const TabContent = document.querySelector('.tab-content');
const tabpanelActive = document.querySelector('.tabpanel-item.active');
const tabpanelItem = document.querySelectorAll('.tabpanel-item');
const liPanel = document.querySelectorAll('.list-inline-item.product-li-tabpanel');
TabContent.style.height = tabpanelActive.clientHeight + 60 + 'px';

for(let i=0; i<liPanel.length; i++){
    jQuery("#carousel").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
          ],
        smartSpeed: 800,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
      
          600: {
            items: 1
          },
      
          1024: {
            items: 4
          },
      
          1366: {
            items: 4
          }
        }
    });
    
    liPanel[i].addEventListener('click',function(){
        if(liPanel[i].className.indexOf('active') != -1){
            return;
        }
        else{
            for(let j=0; j<tabpanelItem.length; j++){
                tabpanelItem[j].classList.remove('active');
                liPanel[j].classList.remove('active');
            }
            console.log(1);
            TabContent.style.height = tabpanelItem[i].clientHeight + 60 + 'px';
            tabpanelItem[i].classList.add('active');
            liPanel[i].classList.add('active');
        }
        })
    }


    // slide product_gallery
    const imgProductSlide = document.querySelectorAll('.slide-top .product-img-item');
    const galleryPrv = document.querySelector('.fa.fa-chevron-left');
    const galleryNext = document.querySelector('.fa.fa-chevron-right');
    const SlideTop = document.querySelector('.slide-top ');
    let arrHeight =[];
    let indexProductGallery = 0;
    
    
    galleryNext.addEventListener('click',function(){
        let imgCurrent = imgProductSlide[indexProductGallery];
        indexProductGallery = (indexProductGallery == imgProductSlide.length-1) ? 0 : indexProductGallery +1 ;
        let imgPrv = imgProductSlide[indexProductGallery];
        imgCurrent.style.opacity = 0;
        imgPrv.style.opacity = 1;
        
        for(let i =0; i< btnColor.length; i++){
            PriceRed[i].classList.remove('active');
            size[i].classList.remove('active');
            btnColor[i].classList.remove('active');
        }
        for(let i =0; i< pStock.length; i++){
            btnSize[i].classList.remove('active');
            pStock[i].classList.remove('active');
        }
        formPrice.value=pricesubmit[indexProductGallery].innerHTML;
        formColor.value=btnColor[indexProductGallery].innerText;
        formSize.value=size[indexProductGallery].firstElementChild.innerText;

        size[indexProductGallery].firstElementChild.classList.add('active');
        divStock[indexProductGallery].firstElementChild.classList.add('active');

        PriceRed[indexProductGallery].classList.add('active');
        size[indexProductGallery].classList.add('active');
        btnColor[indexProductGallery].classList.add('active');
    })
    galleryPrv.addEventListener('click',function(){
        let imgCurrent = imgProductSlide[indexProductGallery];
        indexProductGallery = (indexProductGallery == 0) ? imgProductSlide.length-1 : indexProductGallery-1 ;
        let imgPrv = imgProductSlide[indexProductGallery];
        imgCurrent.style.opacity = 0;
        imgPrv.style.opacity = 1;
        
        for(let i =0; i< btnColor.length; i++){
            PriceRed[i].classList.remove('active');
            size[i].classList.remove('active');
            btnColor[i].classList.remove('active');
        }
        formPrice.value=pricesubmit[indexProductGallery].innerHTML;
        formColor.value=btnColor[indexProductGallery].innerText;
        formSize.value=size[indexProductGallery].firstElementChild.innerText;

        size[indexProductGallery].firstElementChild.classList.add('active');
        divStock[indexProductGallery].firstElementChild.classList.add('active');

        PriceRed[indexProductGallery].classList.add('active');
        size[indexProductGallery].classList.add('active');
        btnColor[indexProductGallery].classList.add('active');
    })
}

// checkout



