// back to top
document.getElementById('back-to-top').addEventListener('click', function (event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


// header
$(document).ready(function () {
    $('.search-btn').click(function (event) {
        event.preventDefault();
        var searchInput = $('.search-input');
        searchInput.removeClass('d-none');
        searchInput.focus();
        $(this).addClass('d-none');
    });
});


$(document).ready(function () {
    // Get references to residential and company checkboxes, different radio button, and thesame radio button
    var residentialCheckboxes = $(".residentialRadio");
    var companyCheckboxes = $(".companyRadio");
    var differentCheckbox = $(".differentRadio");
    var thesameRadio = $(".thesameRadio");
    var residentialCheckboxes1 = $(".residentialRadio1");
    var companyCheckboxes1 = $(".companyRadio1");

    // Function to show residential elements and hide company elements
    function showResidentialElements() {
        $(".residentialCheckGroups").removeClass("d-none");
        $(".companyCheckGroups").addClass("d-none");
    }

    // Function to show company elements and hide residential elements
    function showCompanyElements() {
        $(".companyCheckGroups").removeClass("d-none");
        $(".residentialCheckGroups").addClass("d-none");
    }

    // Function to show residential elements1 and hide company elements1
    function showResidentialElements1() {
        $(".residentialCheckGroups1").removeClass("d-none");
        $(".companyCheckGroups1").addClass("d-none");
    }

    // Function to show company elements1 and hide residential elements1
    function showCompanyElements1() {
        $(".companyCheckGroups1").removeClass("d-none");
        $(".residentialCheckGroups1").addClass("d-none");
    }

    // Function to show elements for thesame option
    function showThesameCheckGroups() {
        $(".thesameCheckGroups").each(function () {
            var hasContent = $(this).find("*").length > 0;
            if (hasContent) {
                $(this).removeClass("d-none");
            } else {
                $(this).addClass("d-none");
            }
        });

        // If thesameCheckGroups has no content, hide differentCheckGroups
        if (!$(".thesameCheckGroups").hasClass("d-none")) {
            hideDifferentCheckGroups();
        }
    }

    // Function to hide elements for thesame option
    function hideThesameCheckGroups() {
        $(".thesameCheckGroups").addClass("d-none");
    }

    // Function to hide differentCheckGroups
    function hideDifferentCheckGroups() {
        $(".differentCheckGroups").addClass("d-none");
    }

    // Add event listeners to residential checkboxes
    residentialCheckboxes.change(function () {
        if ($(this).prop("checked")) {
            showResidentialElements();
        } else {
            $(".residentialCheckGroups").addClass("d-none");
        }
    });

    // Add event listeners to company checkboxes
    companyCheckboxes.change(function () {
        if ($(this).prop("checked")) {
            showCompanyElements();
        } else {
            $(".companyCheckGroups").addClass("d-none");
        }
    });

    // Add event listeners to residential checkboxes 1
    residentialCheckboxes1.change(function () {
        if ($(this).prop("checked")) {
            showResidentialElements1();
        } else {
            $(".residentialCheckGroups1").addClass("d-none");
        }
    });

    // Add event listeners to company checkboxes 1
    companyCheckboxes1.change(function () {
        if ($(this).prop("checked")) {
            showCompanyElements1();
        } else {
            $(".companyCheckGroups1").addClass("d-none");
        }
    });

    // Add event listener to different checkbox
    differentCheckbox.change(function () {
        if ($(this).prop("checked")) {
            toggleDifferentAddressSections(true);
        } else {
            toggleDifferentAddressSections(false);
        }
    });

    // Add event listener to thesame radio button
    thesameRadio.change(function () {
        if ($(this).prop("checked")) {
            showThesameCheckGroups();
        } else {
            hideThesameCheckGroups();
        }
    });

    // Add event listeners to radio buttons for handling multiple selection
    $("input[type='radio']").click(function () {
        var rowName = $(this).attr("name");
        $("input[name='" + rowName + "']").not(this).prop("checked", false);
    });

    // Function to toggle different address sections
    function toggleDifferentAddressSections(checked) {
        $(".differentCheckGroups").each(function () {
            var hasContent = $(this).find("*").length > 0; // Check if the group has any content
            if (hasContent) {
                if (checked) {
                    $(this).removeClass("d-none");
                } else {
                    $(this).addClass("d-none");
                }
            } else {
                console.log("Không tìm thấy nội dung trong nhóm.");
            }
        });
    }
});

$(document).ready(function () {
    $('#toggleFormCheckbox').change(function () {
        $('#hiddenForm').collapse('toggle');
    });
});



// Jquery
$(document).ready(function () {
    // Ẩn các phần tử product-list và product-details ban đầu
    $('#product-list, #product-details').hide();

    // Bắt sự kiện khi chọn một danh mục
    $('#category-list button').click(function () {
        // Hiển thị tên danh mục đã chọn
        var category = $(this).val();
        $('#selected-category').text(category);

        // Ẩn product-details nếu đang hiển thị
        $('#product-details').hide();

        // Hiển thị danh sách sản phẩm của danh mục đã chọn
        $('#product-list').show();

        // Ẩn tất cả các sản phẩm
        $('#product-list button').hide();

        // Hiển thị danh sách sản phẩm của danh mục đã chọn
        $('#product-list button[value^="' + category + '"]').parent().show();
    });

    // Bắt sự kiện khi chọn một sản phẩm
    $('#product-list button').click(function () {
        // Lấy thông tin sản phẩm đã chọn
        var productName = $(this).find('p.form-text.text-center').text();
        var productImage = $(this).find('img').attr('src');
        // Hiển thị thông tin sản phẩm
        $('#product-details p.fw-bold').text(productName);
        $('#product-details img').attr('src', productImage);
        // Hiển thị product-details
        $('#product-details').show();
    });
});

// end header

// discover coffee
$('.discover-coffee').slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: `<button type='button' class='arrow-coffee-discover slick-prev-discover pull-left d-none d-lg-block'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" stroke="#000" stroke-width="1"/>
                    </svg>
                </button>`,
    nextArrow: `<button type='button' class='arrow-coffee-discover slick-next-discover pull-right d-none d-lg-block'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" stroke="#000" stroke-width="1"/>
                    </svg>
                </button>`,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: false,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
// end discover coffee

// product
$('.similar').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: `<button type='button' class='bt-arrow-product bt-pre-product d-similar-none p-auto btn-left'>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" stroke="#000" stroke-width="1"/>
            </svg>
        </button>`,
    nextArrow: `<button type='button' class='bt-arrow-product bt-next-product d-similar-none p-auto btn-right'>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" stroke="#000" stroke-width="1"/>
            </svg>
        </button>`,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
        }
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
    ]
});

// end product

$('.explore').slick({
    centerMode: true,
    centerPadding: '0',
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: `<button type="button"
                         class="btn-pre-product bt-arrow-product bt-pre-product d-none d-md-block explore-pre explore-btn_arrow">
                         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                             fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16" 
                             strok-width="5">
                             <path fill-rule="evenodd"
                                 d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                                  strok-width="3" />
                         </svg>
                     </button>`,
    nextArrow: `<button type="button"
                         class="btn-next-product bt-arrow-product bt-next-product d-none d-md-block explore-next explore-btn_arrow">
                         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                             fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16" 
                             strok-width="3">
                             <path fill-rule="evenodd"
                                 d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                         </svg>
                     </button>`,
    responsive: [{
        breakpoint: 1200,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 3,
            slidesToScroll: 1,
        }
    },
    {
        breakpoint: 480,
        settings: {
            arrows: false,
            centerPadding: '0',
            slidesToShow: 1
        }
    }
    ]
});

// var index = $('.items-explore-machines[data-img="' + text + '"]').first().index();

// Thêm xử lý sự kiện click vào các sản phẩm
$('.items-explore-machines').on('click', function () {
    var clickedIndex = $(this).attr('data-slick-index');
    $('.explore').slick('slickGoTo', clickedIndex);
});


// Thêm xử lý sự kiện click vào các mục trên thanh điều hướng
$('.spanType-explore-machines').on('click', function () {
    var text = $(this).attr('data-text');
    // Tìm index của sản phẩm có cùng data-img với data-text được chọn
    var index = $('.items-explore-machines[data-img="' + text + '"]').first().index();
    $('.explore').slick('slickGoTo', index);
});

// Xử lý sự kiện khi carousel thay đổi slide
$('.explore').on('afterChange', function (event, slick, currentSlide) {
    var text = $('.items-explore-machines').eq(currentSlide).attr('data-img');
    $('.spanType-explore-machines').removeClass('spanType-active');
    $('.spanType-explore-machines[data-text="' + text + '"]').addClass('spanType-active');
});


$('.exlpore_coffee').slick({
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: `<button type="button"
                    class="btn-pre-product bt-arrow-product bt-pre-product d-none d-md-block pre-explore_coffee">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16" stroke="#000"
                        strok-width="5">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"
                            stroke="#000" strok-width="3" />
                    </svg>
                </button>`,
    nextArrow: `<button type="button"
                    class="btn-next-product bt-arrow-product bt-next-product d-none d-md-block next-explore_coffee">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16" stroke="#000"
                        strok-width="3">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </button>`,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});


$(document).ready(function () {
    $('.faq-label').on('click', function () {
        var faqContent = $(this).next('.faq-content');
        var faqIcon = $(this).find('.icon-faq');

        $('.faq-content').not(faqContent).removeClass('active');
        $('.icon-faq').not(faqIcon).removeClass('active');

        faqContent.toggleClass('active');
        faqIcon.toggleClass('active');
    });
});


// 
document.addEventListener('DOMContentLoaded', function () {
    var sugarButton = document.querySelector('.btn-inredient');
    var sugarOptions = document.querySelector('.sugar-options');

    sugarButton.addEventListener('click', function (event) {
        event.stopPropagation();
        toggleSugarOptions();
    });

    document.addEventListener('click', function (event) {
        var isClickInside = sugarOptions.contains(event.target);
        if (!isClickInside) {
            sugarOptions.style.display = 'none';
        }
    });

    function toggleSugarOptions() {
        if (sugarOptions.style.display === 'none') {
            sugarOptions.style.display = 'block';
        } else {
            sugarOptions.style.display = 'none';
        }
    }
});


// product
// Lấy tất cả các ảnh thumnail
document.addEventListener('DOMContentLoaded', function () {
    var thumbnails = document.querySelectorAll('.img-thumnail');
    var mainImage = document.getElementById('mainImage');

    // Lặp qua từng ảnh và thêm sự kiện click
    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            // Loại bỏ lớp active từ tất cả thumbnails
            thumbnails.forEach(function (img) {
                img.classList.remove('active-thumbnail');
            });

            // Thêm lớp active cho thumbnail được nhấp vào
            thumbnail.classList.add('active-thumbnail');

            // Thay đổi thuộc tính src của ảnh chính
            mainImage.src = thumbnail.src;
        });
    });
});

// chose size cup
$('.input-size').change(function () {
    if ($(this).is(":checked")) {
        // Loại bỏ class "size-active" từ tất cả các label
        $('label').removeClass('size-active');

        // Thêm class "size-active" cho label kế tiếp của input radio được chọn
        $(this).next('label').addClass('size-active');
    }
});


// category product

document.addEventListener("DOMContentLoaded", function () {
    var categoryLinks = document.querySelectorAll('.category-link');
    categoryLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var categoryId = link.getAttribute('data-category-id');
            var route = link.getAttribute('data-route');
            var isProductPage = window.location.pathname.includes('coffee');
            if (isProductPage) {
                // Trang sản phẩm: Chỉ chuyển đến danh mục sản phẩm
                var categoryElement = document.getElementById('category-' + categoryId);
                if (categoryElement) {
                    categoryElement.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            } else {
                // Trang khác: Chuyển hướng đến trang danh mục sản phẩm với hash
                window.location.href = route + '#category-' + categoryId;
            }
        });
    });

    // Xác định phần tử cần cuộn xuống khi trang mới được tải hoàn toàn
    window.addEventListener('load', function () {
        var hash = window.location.hash;
        if (hash) {
            var categoryElement = document.querySelector(hash);
            if (categoryElement) {
                categoryElement.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        }
    });
});

// ỉnedient
document.addEventListener("DOMContentLoaded", function () {
    var rows = document.querySelectorAll('.row-ingredient');
    rows.forEach(function (row) {
        var labels = row.querySelectorAll('.btn-inrefient');
        labels.forEach(function (label) {
            label.addEventListener('click', function (event) {
                event.preventDefault();
                // Tắt tất cả các option trong cùng một row trước khi kích hoạt option hiện tại
                labels.forEach(function (otherLabel) {
                    if (otherLabel !== label) {
                        otherLabel.classList.remove('inredient-active');
                    }
                });
                label.classList.add('inredient-active');
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var rows = document.querySelectorAll('.row-ingredient');
    rows.forEach(function (row) {
        var checkboxes = row.querySelectorAll('input[type="checkbox"]');
        var hiddenInput = row.querySelector('input[name="ingredient_options[]"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('click', function (event) {
                // Loại bỏ các option khác nếu một option được chọn
                if (checkbox.checked) {
                    checkboxes.forEach(function (option) {
                        if (option !== checkbox) {
                            option.checked = false;
                        }
                    });
                }
                // Cập nhật giá trị của input hidden với option được chọn
                hiddenInput.value = checkbox.checked ? checkbox.value : '';
            });
        });
    });
});





