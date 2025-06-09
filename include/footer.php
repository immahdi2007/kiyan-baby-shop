<script>


    const productOrder = document.querySelectorAll(".prd_detail_img_container.order");

    productOrder.forEach(product => {
        const Minusbtn = product.querySelector(".MinusNum");
        const plusbtn = product.querySelector(".plusNum");
        const prdAmountInp = product.querySelector(".prdStock");
        const prd_price = product.querySelector(".prd_price");
        console.dir(product);
        const total_price = product.querySelector(".sumprice_prd");

        const prd_stock = parseInt(product.dataset.stock);
        document.addEventListener("DOMContentLoaded", () => {
            let price = parseInt(prd_price.textContent.replace(/٬/g, "").replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d)));
            let TotalPrice = parseInt(prdAmountInp.value) * price;
            total_price.textContent = TotalPrice.toLocaleString("FA-IR");
        })


        if (plusbtn) {
            plusbtn.addEventListener("click", () => {
                let currentValue = parseInt(prdAmountInp.value);
                if (isNaN(currentValue)) currentValue = 1;
                if (currentValue < prd_stock) {
                    prdAmountInp.value = currentValue + 1;
                    let price = parseInt(prd_price.textContent.replace(/٬/g, "").replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d)));
                    let TotalPrice = parseInt(prdAmountInp.value) * price;
                    total_price.textContent = TotalPrice.toLocaleString("FA-IR");
                } else {
                    return;
                }
            });
        }



        if (Minusbtn) {
            Minusbtn.addEventListener("click", () => {
                let currentValue = parseInt(prdAmountInp.value);
                if (isNaN(currentValue)) currentValue = 1;
                if (parseInt(prdAmountInp.value) > 1) {
                    prdAmountInp.value = currentValue - 1;
                    let price = parseInt(prd_price.textContent.replace(/٬/g, "").replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d)));
                    let TotalPrice = parseInt(prdAmountInp.value) * price;
                    total_price.textContent = TotalPrice.toLocaleString("FA-IR");
                }
            });
        }
    });


    //sadasdasdsadsadasd

    document.addEventListener("DOMContentLoaded", () => {
        let price = parseInt(prd_price.textContent.replace(/٬/g, "").replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d)));
        let TotalPrice = parseInt(prdAmountInp.value) * price;
        total_price.textContent = TotalPrice.toLocaleString("FA-IR");
    })

    const Minusbtn = document.querySelector(".MinusNum");
    const plusbtn = document.querySelector(".plusNum");
    const prdAmountInp = document.querySelector(".prdStock");
    const prd_stock = <?= isset($row['prd_stock']) ? json_encode((int) $row['prd_stock']) : 0 ?>;
    const prd_price = document.querySelector(".prd_price");
    const total_price = document.querySelector(".sumprice_prd");

    if (plusbtn) {
        plusbtn.addEventListener("click", () => {
            let currentValue = parseInt(prdAmountInp.value);
            if (isNaN(currentValue)) currentValue = 1;
            if (currentValue < prd_stock) {
                prdAmountInp.value = currentValue + 1;
                let price = parseInt(prd_price.textContent.replace(/٬/g, "").replace(/[۰-۹]/g, d => "۰۱۲۳۴۵۶۷۸۹".indexOf(d)));
                let TotalPrice = parseInt(prdAmountInp.value) * price;
                total_price.textContent = TotalPrice.toLocaleString("FA-IR");
            } else {
                return;
            }
        });
    }
    if (Minusbtn) {
        Minusbtn.addEventListener("click", () => {
            let currentValue = parseInt(prdAmountInp.value);
            if (isNaN(currentValue)) currentValue = 1;
            if (parseInt(prdAmountInp.value) > 1) {
                prdAmountInp.value = currentValue - 1;
            }
        });
    }



    //homepage icon animation
    const pic1 = document.querySelector(".left-pic-1");
    const pic2 = document.querySelector(".left-pic-2");
    const pic3 = document.querySelector(".left-pic-3")
    const parent = document.querySelector(".home-page");
    if (parent) {
        parent.addEventListener("mouseenter", () => {
            pic1.classList.add("pic-active");
            pic2.classList.add("pic-active");
            pic3.classList.add("pic-active");
        })

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300 && pic1.classList.contains("pic-active")) {
                pic1.classList.remove("pic-active");
                pic2.classList.remove("pic-active");
                pic3.classList.remove("pic-active");
            } else if (window.scrollY < 200) {
                pic1.classList.add("pic-active");
                pic2.classList.add("pic-active");
                pic3.classList.add("pic-active");
            }
        })
    }
    let lastscrolltop = 0;
    const header = document.querySelector("header");
    window.addEventListener("scroll", () => {
        let scrolltop = window.scrollY;
        if (scrolltop > lastscrolltop && scrolltop > 200) {
            header.classList.add("hidden");
        } else {
            header.classList.remove("hidden");
        }
        lastscrolltop = scrolltop;
    })
</script>
<!-- slider and product boxs -->
<script>
    const products = [
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "ست لباس شلوار کودک",
            price: 449000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "ست لباس دخترانه",
            price: 590000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "پیراهن پسرانه اسپرت",
            price: 390000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "ست مجلسی کودک",
            price: 799000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "بلوز و شلوار اسپرت دخترانه",
            price: 449000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "کت و شلوار بچه‌گانه",
            price: 899000,
            link: "#"
        },
        {
            imgSrc: "./img/model-lebas-kodak-5.jpg",
            title: "پالتو زمستانی کودک",
            price: 1100000,
            link: "#"
        }
    ];

    const slider = document.querySelectorAll('.slider').forEach(Slider => {
        // const slider = document.querySelectorAll('.slider')
        products.forEach(product => {
            const productHTML = `
        <div class="prd-item__container">
            <div class="prd_item">
                <a href="#"><svg class="add-to__fav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="40" height="40">
                <path class="add-to__fav" d="M15 7C8.9424416 7 4 11.942442 4 18C4 22.096154 7.0876448 25.952899 10.851562 29.908203C14.615481 33.863507 19.248379 37.869472 22.939453 41.560547 A 1.50015 1.50015 0 0 0 25.060547 41.560547C28.751621 37.869472 33.384518 33.863507 37.148438 29.908203C40.912356 25.952899 44 22.096154 44 18C44 11.942442 39.057558 7 33 7C29.523564 7 26.496821 8.8664883 24 12.037109C21.503179 8.8664883 18.476436 7 15 7 z M 15 10C17.928571 10 20.3663 11.558399 22.732422 15.300781 A 1.50015 1.50015 0 0 0 25.267578 15.300781C27.6337 11.558399 30.071429 10 33 10C37.436442 10 41 13.563558 41 18C41 20.403846 38.587644 24.047101 34.976562 27.841797C31.68359 31.30221 27.590312 34.917453 24 38.417969C20.409688 34.917453 16.31641 31.30221 13.023438 27.841797C9.4123552 24.047101 7 20.403846 7 18C7 13.563558 10.563558 10 15 10 z M 31.976562 13.978516 A 1.50015 1.50015 0 0 0 30.5 15.5L30.5 17.5L28.5 17.5 A 1.50015 1.50015 0 1 0 28.5 20.5L30.5 20.5L30.5 22.5 A 1.50015 1.50015 0 1 0 33.5 22.5L33.5 20.5L35.5 20.5 A 1.50015 1.50015 0 1 0 35.5 17.5L33.5 17.5L33.5 15.5 A 1.50015 1.50015 0 0 0 31.976562 13.978516 z" fill="#FFCBCB" />
                </svg></a>
                <img src="${product.imgSrc}" alt="${product.title}">
                <div class="prd__caption">
                    <h3><a href="${product.link}">${product.title}</a></h3>
                    <span class="price">
                        <a class="price_T" href="${product.link}">${product.price}</a>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20"
                                height="20" viewBox="0 0 250 250">
                                <image id=" x="24" y="99" width="93" height="93"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF0AAABdCAYAAADHcWrDAAAEnElEQVR4nO2dTaiVRRiAn2vRVYtS+pGEq0FQUJQaZiXJhRQxEIpWhYuyP6kIXBRZbYxw08pdUTt/aeNCV6ZGuagoLySSaS1cpFEh/Xqte29pvIf54PNw7r3f971zzjtzfB+Y5ZzzznPmzjfzzsx3AS42LF/jNGKGa+s9Lt0Al26ASzfApRvg0g1w6Qa4dANcugEu3QCXboBLN8ClG+DSDXDpBrh0A1y6AS7dAJdugEs3wKUb4NINcOkGuHQDXLoBLt0Al26ASzfApRvg0g1w6Qa4dANcugEu3QCXboBLN8ClG3DlZdDGBcAaYDlwJ7AQuAEYqFD3b+A34DvgW+Aw8DHwizaofrzSOBN4Cvhc0b7JygXgI+AJTaftJ+lXABuAH7sgu1M5BTwfvrcW/SJ9EXCkR7Lbi3zv0jrB9oP0Z4B/jIQXZQJ4peKzInvpbxvLbi/bgKumCzpn6VsSE16UvdOJz1X6C4kKL8qOqYaaHKXfD4wnLl3Ka5M1IDfpMgc/mYHwi+Hhuqy9ATmmAd4EbksgjirI4umDTouonHr6fOB8Jr28XF4sNyK3nr4RmJVAHHXZVJ7N5CR9EHgugTiaMASsK+rlJH01MCeBOJqyvqiXk/RHEohBw4qQZs5K+oMJxKDlITKSfh1wu/IzfghpWOltc2uU64EHgPdDLl3DcFE3hynjsHLK9lWQrGWtciX8ZU7SNyrilJTvLRFjeUMRyx/Fh+QgfZsizh2RY7lambvPZkxfrKh7IGIcwihwTFF/Tg7SZVF0h6L+kYixFIxqKucg/e4mG78BydOciB6Rkhyka4YWee78FzGWKOQgfYmi7kjEOKKRg/R7FHWTPBCVunQZy+9S1O/GQ1RN6tJlh2h2w7oylz4eOZ4opC5dM7QcBf6NGEs0NNKbTuPqoJm5JPkQJUg/17DuTZFj6YQmndu30m+NHE+ZoU7HF2pwsouxqRDpZxQf8FIXY3tdOfzNjBhLdLYrMmbjXdrReVSZP5fyXhedfaKIq7XP+6qycb8CKyM26NlIR+Zk+b8qYlxl1NKXRmigbGPtBh4Gbq55LeSasBX3NPBFhFjKRebqb4X5/mAq0gfCuPkTcGPEoJzJmTsj9NJdLqlnTBTnpxf5PwDsCWMyqyqmZLJk3t/nDU6B72mbB2++bFX0jtYquSxdZg47+7zR1rQ2ydvvxMwLe4o5H9RMlfPB77n2ZfbPYb7sxGd7kefqlJ49ERYsy118NGSF/Tjw+1QfOBBORsVcHcYsY+GvMtX42suWqr+eXNf4MNFGPBnOe09kIHykbgpCxvytiTXinVJ8Lycu/Izm8KqMR38l0IitHWZcmxIVflp5kqGFvBFoj1EDJkKvnowNid2gHol8PLt14UqT2qxbPq24QS0nBz4zlj0W3soRM418CfcB74ZNjG707L3h3Vt1kKHnMeBQj2WPhp2qhVVirfRCmGmQDYt7wyWmxWHDQDaVr614TGM8/HCSDPom9OyDwFllXEPhRxsuvTAtxhUYwo2KU2EYkRep7QvPvErEkD4Vg203nEVw+T0oskLr9YEgWfg1feGZ7D38qfp24H99EGZ9AK4LGgAAAABJRU5ErkJggg==" />
                                <image x="117" y="109" width="106" height="115"
                                    xlink:href="data:img/png;base64,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" />
                                <image x="44" y="38" width="81" height="87"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFEAAABXCAYAAAB81qkrAAADIElEQVR4nO2cOYgUQRSG/13vW8QNFvHAc8FABC9EFDFRQdFEBUEEzQQ1NxE0V8TIyEBDY8VABFE8AhNZFRdRPBZkBZf1QtaDt1TLMLa7Pf3+pqt7/g/ewATV9eqb7po66EIEnAfwO2d8iqEBnRHkUHkkkYAkEpBEApJIQBIJSCIBSSQgiQQkkYAkEpBEApJIQBIJdESQwxQAk3KWteWwQUIOJwGcy1l273hCAl6+hagsJvFVzuR7AeyscuNZmMSFOa8VxapyDOiPhYAkEpBEApJIQBIJSCIBSSQgiQQkkYAkEpBEApJIQBIJSCIBSSQgiQQkkYAkEpBEApJIQBIJSCIBSSQgiQQkkYAkEpBEApJIQBIJSCIBSSQgiQQkkYAkEpBEApJIwCNxejStKBmT+DNnCvNrdCe7XooyCZ9zlp0IYLmn8oiY5Uml0/la17ZYrbTIHE9hkzjkKL/PU3lE9HhSMYkvHOU3A1gdq5mM2MuZGx3lh7wSjdPO8mWzA8A0Rw5f7OOQ49S4JHZXWOI9Z9tH3o1cRJA4AGBB+T5a5qCz3V8bh0cvCSKfAuiqjr+R4dmgs82P0TBYvk5Iqic8GksI1yoaewRvAJjprOdO45f1hDsxCRsyHYnkaIQ0NgF4T2rrnubrPyOKtHgAYFdEU8NuABcADJPaZ/3hjOZKjpElJvEOwEUA+wGsAjA3HJ5RJJNDPTaGPQrgGoDv5HZdScvfGtZfkMg6xtb/3QQnJCdT3B/tKZoQThlpd0ljxfaxuqItkjRq3GoWNi5F4uswaF5XcOdfRX6EEcdAltxtZeOh7rp/4lSrP7zNqT9I3N+4mXfMu5Ywv6xD9HnXBTaEI63aVaCNnRd7BCasBPCmDQW+DW2nMQ/A3TYS2Bu2henYKXdnwl51nQVeTVtcYLMmTH3qJu8jgMNFy2ukI+zP9NVAni2PXQorP6Vgs54DYf2wavJsBnIZwNKy5KWxAsBZAE8iFvcLwCMAx1l3XpFL+F1hMcP6z2Xh1+4Oe7xTC6w3YTjsCfeHLud56MdvZ537ZqXMfZDZBV7blu7tUS0eAH8AIsC251D0jUYAAAAASUVORK5CYII=" />
                            </svg>
                    </span>
                    <a class="addtocart__a" href="#"><svg class="addtocart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="26" height="26">
                    <path class="addtocart" d="M13 -0.01171875C12.15 -0.01171875 11.338484 0.35142188 10.771484 0.98242188L4.4550781 8L1 8C0.45 8 0 8.45 0 9L0 11C0 11.55 0.45 12 1 12L1.3300781 12L2.7207031 20.330078C2.8807031 21.290078 3.7194531 22 4.6894531 22L14.060547 22C14.300547 19.73 15.39 17.719297 17 16.279297L17 13C17 12.45 17.45 12 18 12C18.55 12 19 12.45 19 13L19 14.929688C20.21 14.329688 21.56 14 23 14C23.45 14 23.890312 14.029844 24.320312 14.089844L24.669922 12L25 12C25.55 12 26 11.55 26 11L26 9C26 8.45 25.55 8 25 8L21.544922 8L15.228516 0.98242188C14.661516 0.35242187 13.85 -0.01171875 13 -0.01171875 z M 13 1.9980469C13.275375 1.9980469 13.550188 2.1063125 13.742188 2.3203125L18.855469 8L7.1445312 8L12.257812 2.3203125C12.450312 2.1063125 12.724625 1.9980469 13 1.9980469 z M 8 12C8.55 12 9 12.45 9 13L9 18C9 18.55 8.55 19 8 19C7.45 19 7 18.55 7 18L7 13C7 12.45 7.45 12 8 12 z M 13 12C13.55 12 14 12.45 14 13L14 18C14 18.55 13.55 19 13 19C12.45 19 12 18.55 12 18L12 13C12 12.45 12.45 12 13 12 z M 23 16C21.51 16 20.13 16.459766 19 17.259766C18.39 17.679766 17.850156 18.200781 17.410156 18.800781C16.710156 19.720781 16.240078 20.81 16.080078 22C16.020078 22.32 16 22.66 16 23C16 26.87 19.13 30 23 30C26.87 30 30 26.87 30 23C30 19.47 27.390234 16.550078 23.990234 16.080078C23.670234 16.020078 23.34 16 23 16 z M 23 19C23.17 19 23.340469 19.040859 23.480469 19.130859C23.790469 19.290859 24 19.62 24 20L24 22L26 22C26.55 22 27 22.45 27 23C27 23.55 26.55 24 26 24L24 24L24 26C24 26.55 23.55 27 23 27C22.45 27 22 26.55 22 26L22 24L20 24C19.45 24 19 23.55 19 23C19 22.45 19.45 22 20 22L21.300781 22L22 22L22 21.869141L22 20C22 19.45 22.45 19 23 19 z" fill="#FFCBCB" />
                    </svg></a>
                </div>  
            </div>
        </div>
    `;
            Slider.insertAdjacentHTML('beforeend', productHTML);
        });
    });
    const sliders = document.querySelectorAll('.slider');
    sliders.forEach(slider => {
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });
    });
</script>
<script>
    const inputField = document.querySelector('.input-field');
    const srchi = document.querySelector('.srch_i');
    inputField.addEventListener('input', function () {
        if (inputField.validity.valid) {
            srchi.classList.add('valid');
        } else {
            srchi.classList.remove('valid');
        }
    });
    const user__dropdown = document.querySelector('.user__dropdown');
    const dropdown__wraper = document.querySelector('.dropdown__wraper');
    const user__icon = document.querySelector('.buy-cart.left');
    const userDropTrigger = [user__dropdown, dropdown__wraper, user__icon];
    if (user__icon) {
        userDropTrigger.forEach(el => {
            el.addEventListener("mouseenter", () => {
                user__dropdown.classList.add('show');
            });
            el.addEventListener("mouseleave", () => {
                user__dropdown.classList.remove("show");
            });
        });
    }
    const ctg_dropdown = document.querySelector(".category__dropdown");
    const prd_ctg = document.querySelector(".Product__categories");
    const ctgDropdown__wraper = document.querySelector(".ctgDropdown__wraper");
    const ctgDropDownTrigger = [ctg_dropdown, prd_ctg, ctgDropdown__wraper];

    ctgDropDownTrigger.forEach(el => {
        el.addEventListener("mouseenter", () => {
            ctg_dropdown.classList.add("Cshow");
        });
        el.addEventListener("mouseleave", () => {
            ctg_dropdown.classList.remove("Cshow");
        });
    }); 
</script>
<script>
    document.querySelectorAll('.price_T').forEach(el => {
        let priceNumber = parseInt(el.textContent.replace(/,/g, ""));
        el.textContent = priceNumber.toLocaleString("fa-IR");
    });
</script>
<footer>
    <div class="custom-shape-divider-bottom-1742203312"> <!--برای بالای فوتر -->
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z" class="shape-fill"></path>
        </svg>
    </div>
    </div>
    <div class="info footer__conteiner">
        <h2>فروشگاه کودک</h2>
        <p>.فروشگاه کودک یک فروشگاه کامل برای انواع پوشاک کودک است</p>
        <div class="social-media">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="30" height="30">
                    <path
                        d="M21.580078 7C13.541078 7 7 13.544938 7 21.585938L7 42.417969C7 50.457969 13.544938 57 21.585938 57L42.417969 57C50.457969 57 57 50.455062 57 42.414062L57 21.580078C57 13.541078 50.455062 7 42.414062 7L21.580078 7 z M 47 15C48.104 15 49 15.896 49 17C49 18.104 48.104 19 47 19C45.896 19 45 18.104 45 17C45 15.896 45.896 15 47 15 z M 32 19C39.17 19 45 24.83 45 32C45 39.17 39.169 45 32 45C24.83 45 19 39.169 19 32C19 24.831 24.83 19 32 19 z M 32 23C27.029 23 23 27.029 23 32C23 36.971 27.029 41 32 41C36.971 41 41 36.971 41 32C41 27.029 36.971 23 32 23 z"
                        fill="#FFCBCB" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30" height="30">
                    <path
                        d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z"
                        fill="#FFCBCB" />
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
                    <path
                        d="M22,3.999c-0.78,0.463-2.345,1.094-3.265,1.276c-0.027,0.007-0.049,0.016-0.075,0.023c-0.813-0.802-1.927-1.299-3.16-1.299 c-2.485,0-4.5,2.015-4.5,4.5c0,0.131-0.011,0.372,0,0.5c-3.353,0-5.905-1.756-7.735-4c-0.199,0.5-0.286,1.29-0.286,2.032 c0,1.401,1.095,2.777,2.8,3.63c-0.314,0.081-0.66,0.139-1.02,0.139c-0.581,0-1.196-0.153-1.759-0.617c0,0.017,0,0.033,0,0.051 c0,1.958,2.078,3.291,3.926,3.662c-0.375,0.221-1.131,0.243-1.5,0.243c-0.26,0-1.18-0.119-1.426-0.165 c0.514,1.605,2.368,2.507,4.135,2.539c-1.382,1.084-2.341,1.486-5.171,1.486H2C3.788,19.145,6.065,20,8.347,20 C15.777,20,20,14.337,20,8.999c0-0.086-0.002-0.266-0.005-0.447C19.995,8.534,20,8.517,20,8.499c0-0.027-0.008-0.053-0.008-0.08 c-0.003-0.136-0.006-0.263-0.009-0.329c0.79-0.57,1.475-1.281,2.017-2.091c-0.725,0.322-1.503,0.538-2.32,0.636 C20.514,6.135,21.699,4.943,22,3.999z"
                        fill="#FFCBCB" />
                </svg>
            </a>
        </div>
    </div>

    <div class="privacy footer__conteiner">
        <h2>اطلاعات</h2>
        <ul>
            <li><a href="">حریم خصوصی</a></li>
            <li><a href="">ارسال مرجوعی</a></li>
            <?php if (!isset($page) || $page !== "about"): ?>
                <li><a href="aboutUs.php">درباره ما</a></li>
            <?php else: ?>
                <li><a href="index.php">پوشاک کودک کیان</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="fast-access footer__conteiner">
        <h2>دسترسی سریع</h2>
        <ul>
            <li><a href="" id="user">حساب کاربری من</li></a>
            <li><a href="">سبد خرید</a></li>
            <li><a href="">لیست علاقه مندی</a></li>
            <li><a href="">پیگیری سفارش</a></li>
        </ul>
    </div>
    <div class="contact-us">
        <h2>تماس با ما</h2>
        <ul>
            <li>
                <a href="">035 32321234</a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                        <path
                            d="M19 0L19 2C25.065 2 30 6.935 30 13L32 13C32 5.832 26.168 0 19 0 z M 8.6503906 3.0058594C8.1255067 3.0058594 7.6010996 3.1771036 7.1738281 3.5214844L7.125 3.5605469L3.9804688 6.8046875L4.046875 6.7421875C3.0062406 7.6384134 2.7194504 9.0541178 3.1660156 10.244141C4.0086833 12.674074 6.1568506 17.372953 10.394531 21.605469C14.641274 25.857394 19.389499 27.91343 21.738281 28.830078L21.761719 28.837891L21.785156 28.845703C22.999558 29.252758 24.311449 28.962441 25.251953 28.158203L25.28125 28.132812L28.40625 25.007812C29.235762 24.178301 29.235762 22.724043 28.40625 21.894531L24.308594 17.792969C23.476725 16.9611 22.023275 16.9611 21.191406 17.792969L19.207031 19.777344C18.496637 19.438281 16.74879 18.558644 15.087891 16.974609C13.448585 15.411343 12.61169 13.604382 12.308594 12.90625L14.308594 10.90625C15.186189 10.028655 15.236115 8.5219515 14.224609 7.7167969L14.316406 7.8007812L10.173828 3.5605469L10.126953 3.5214844C9.6996708 3.1771284 9.1752746 3.0058594 8.6503906 3.0058594 z M 19 4L19 6C22.859 6 26 9.14 26 13L28 13C28 8.038 23.963 4 19 4 z M 8.6523438 5C8.7236064 4.9998777 8.7939074 5.026734 8.8632812 5.0800781L12.929688 9.2441406L12.978516 9.2832031C12.967016 9.2740531 13.016941 9.3697821 12.894531 9.4921875L9.9375 12.449219L10.166016 13.052734C10.166016 13.052734 11.294663 16.121404 13.707031 18.421875C16.079259 20.684317 19.003906 21.919922 19.003906 21.919922L19.626953 22.185547L22.605469 19.207031C22.7736 19.0389 22.7264 19.0389 22.894531 19.207031L26.992188 23.308594C27.162675 23.479082 27.162676 23.423262 26.992188 23.59375L23.945312 26.640625C23.481361 27.034971 23.00205 27.13833 22.425781 26.947266C20.163651 26.062686 15.739269 24.126878 11.808594 20.191406C7.8506547 16.238292 5.7997308 11.746595 5.046875 9.5703125L5.0429688 9.5585938L5.0371094 9.5449219C4.8856915 9.1444833 4.9963719 8.5637134 5.3515625 8.2578125L5.3847656 8.2285156L8.4394531 5.0800781C8.508857 5.0272234 8.5810811 5.0001223 8.6523438 5 z M 19 8L19 10C20.654 10 22 11.346 22 13L24 13C24 10.243 21.757 8 19 8 z"
                            fill="#FFCBCB" />
                    </svg></a>
            </li>
            <li>
                <a href="">mahdi.mola.8039@gmail.com</a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                        <path
                            d="M3 4C1.34375 4 0 5.34375 0 7L0 19C0 20.65625 1.34375 22 3 22L23 22C24.65625 22 26 20.65625 26 19L26 7C26 5.34375 24.65625 4 23 4 Z M 3 6L23 6C23.550781 6 24 6.449219 24 7L24 7.5L13 13.4375L2 7.5L2 7C2 6.449219 2.449219 6 3 6 Z M 2 7.78125L8.53125 12.875L2.125 19.4375L9.9375 13.875L13 15.84375L16.0625 13.875L23.875 19.4375L17.46875 12.875L24 7.78125L24 19C24 19.164063 23.945313 19.300781 23.875 19.4375C23.710938 19.761719 23.390625 20 23 20L3 20C2.609375 20 2.289063 19.761719 2.125 19.4375C2.054688 19.300781 2 19.164063 2 19Z"
                            fill="#FFCBCB" />
                    </svg></a>
            </li>
            <li>
                <a href="ContactUs.php">ارسال نظر</a>
                <a href="ContactUs.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                        <path
                            d="M38 8C22.464844 8 10 20.507813 10 35.09375C10 43.320313 13.417969 48.582031 16.691406 53.066406C19.964844 57.554688 23 61.238281 23 66.734375L23 73L25 73L25 66.734375C25 60.5 21.535156 56.3125 18.308594 51.890625C15.082031 47.464844 12 42.777344 12 35.09375C12 23.242188 20.96875 12.789063 33 10.480469L33 31.355469C30.015625 33.085938 28 36.3125 28 40C28 45.511719 32.488281 50 38 50C40.398438 50 42.597656 49.148438 44.324219 47.734375L51.566406 54.984375C51.214844 55.578125 51 56.261719 51 57C51 59.199219 52.800781 61 55 61C57.199219 61 59 59.199219 59 57C59 54.800781 57.199219 53 55 53C54.261719 53 53.578125 53.214844 52.984375 53.566406L45.734375 46.324219C47.148438 44.597656 48 42.398438 48 40C48 36.3125 45.984375 33.085938 43 31.355469L43 10.382813C56.230469 12.453125 63 22.714844 63 32.890625L63 33.164063L69.878906 44.847656C70.140625 45.289063 69.984375 45.820313 69.53125 46.050781L63 49.390625L63 58C63 61.878906 59.878906 65 56 65L49 65C48.449219 65 48 65.449219 48 66C48 66.550781 48.449219 67 49 67L49 73L51 73L51 67L56 67C60.957031 67 65 62.957031 65 58L65 50.609375L70.4375 47.832031C71.894531 47.089844 72.429688 45.242188 71.605469 43.832031L64.96875 32.566406C64.804688 20.277344 55.316406 8 38 8 Z M 38 10C39.03125 10 40.03125 10.046875 41 10.132813L41 30.464844C40.050781 30.164063 39.046875 30 38 30C36.953125 30 35.949219 30.164063 35 30.464844L35 10.175781C35.984375 10.0625 36.984375 10 38 10 Z M 38 11C37.449219 11 37 11.449219 37 12C37 12.550781 37.449219 13 38 13C38.550781 13 39 12.550781 39 12C39 11.449219 38.550781 11 38 11 Z M 38 15C37.449219 15 37 15.449219 37 16C37 16.550781 37.449219 17 38 17C38.550781 17 39 16.550781 39 16C39 15.449219 38.550781 15 38 15 Z M 38 19C37.449219 19 37 19.449219 37 20C37 20.550781 37.449219 21 38 21C38.550781 21 39 20.550781 39 20C39 19.449219 38.550781 19 38 19 Z M 38 23C37.449219 23 37 23.449219 37 24C37 24.550781 37.449219 25 38 25C38.550781 25 39 24.550781 39 24C39 23.449219 38.550781 23 38 23 Z M 38 27C37.449219 27 37 27.449219 37 28C37 28.550781 37.449219 29 38 29C38.550781 29 39 28.550781 39 28C39 27.449219 38.550781 27 38 27 Z M 38 32C42.429688 32 46 35.570313 46 40C46 44.429688 42.429688 48 38 48C33.570313 48 30 44.429688 30 40C30 35.570313 33.570313 32 38 32 Z M 38 35C37.449219 35 37 35.449219 37 36C37 36.550781 37.449219 37 38 37C38.550781 37 39 36.550781 39 36C39 35.449219 38.550781 35 38 35 Z M 35.1875 36.171875C34.914063 36.167969 34.65625 36.273438 34.464844 36.464844C34.074219 36.855469 34.074219 37.488281 34.464844 37.878906C34.855469 38.269531 35.488281 38.269531 35.878906 37.878906C36.269531 37.488281 36.269531 36.855469 35.878906 36.464844C35.695313 36.28125 35.445313 36.175781 35.1875 36.171875 Z M 40.84375 36.171875C40.570313 36.167969 40.3125 36.273438 40.121094 36.464844C39.730469 36.855469 39.730469 37.488281 40.121094 37.878906C40.511719 38.269531 41.144531 38.269531 41.535156 37.878906C41.925781 37.488281 41.925781 36.855469 41.535156 36.464844C41.351563 36.28125 41.101563 36.175781 40.84375 36.171875 Z M 34 39C33.449219 39 33 39.449219 33 40C33 40.550781 33.449219 41 34 41C34.550781 41 35 40.550781 35 40C35 39.449219 34.550781 39 34 39 Z M 42 39C41.449219 39 41 39.449219 41 40C41 40.550781 41.449219 41 42 41C42.550781 41 43 40.550781 43 40C43 39.449219 42.550781 39 42 39 Z M 35.1875 41.828125C34.914063 41.824219 34.652344 41.929688 34.464844 42.121094C34.074219 42.511719 34.074219 43.144531 34.464844 43.535156C34.851563 43.925781 35.488281 43.925781 35.875 43.535156C36.265625 43.144531 36.265625 42.511719 35.875 42.121094C35.691406 41.9375 35.445313 41.832031 35.1875 41.828125 Z M 40.84375 41.828125C40.570313 41.824219 40.308594 41.929688 40.121094 42.121094C39.730469 42.511719 39.730469 43.144531 40.121094 43.535156C40.507813 43.925781 41.144531 43.925781 41.53125 43.535156C41.921875 43.144531 41.921875 42.511719 41.53125 42.121094C41.347656 41.9375 41.101563 41.832031 40.84375 41.828125 Z M 38 43C37.449219 43 37 43.449219 37 44C37 44.550781 37.449219 45 38 45C38.550781 45 39 44.550781 39 44C39 43.449219 38.550781 43 38 43 Z M 55 55C56.117188 55 57 55.882813 57 57C57 58.117188 56.117188 59 55 59C53.882813 59 53 58.117188 53 57C53 55.882813 53.882813 55 55 55 Z M 38 61C37.449219 61 37 61.449219 37 62C37 62.550781 37.449219 63 38 63C38.550781 63 39 62.550781 39 62C39 61.449219 38.550781 61 38 61 Z M 41 64C40.449219 64 40 64.449219 40 65C40 65.550781 40.449219 66 41 66C41.550781 66 42 65.550781 42 65C42 64.449219 41.550781 64 41 64 Z M 45 65C44.449219 65 44 65.449219 44 66C44 66.550781 44.449219 67 45 67C45.550781 67 46 66.550781 46 66C46 65.449219 45.550781 65 45 65Z"
                            fill="#5B5B5B" />
                    </svg></a>
            </li>
        </ul>
    </div>
    <div class="copyright">© تمام حقوق محفوظ است</div>
</footer>
</section>

</body>

</html>