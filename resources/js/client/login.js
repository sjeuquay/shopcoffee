document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("myModal");
    var resetAttemptsUrl = document.getElementById("myModal").dataset.resetAttemptsUrl;
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var overlay = document.getElementById("overlay");
    var userNameInput = document.getElementById("inputUserName").value; // Thay đổi id tại đây
    var countdownElement = document.getElementById("countdown");
    var maxLoginAttempts = 3;

    // Lấy giá trị của thuộc tính data-login-attempts
    var loginAttempts = modal.dataset.loginAttempts;
    console.log(userNameInput);
    if (loginAttempts >= maxLoginAttempts) {
        // Hiển thị modal và overlay
        modal.style.display = "block";
        overlay.style.display = "block";

        var count = 15; // Sửa đổi đây để đếm ngược trong 5 giây

        // Đếm ngược và tự động ẩn modal sau 5 giây
        var countdownInterval = setInterval(function () {
            count--;
            countdownElement.textContent = count; // Cập nhật giá trị đếm ngược

            if (count <= 0) {
                clearInterval(countdownInterval); // Dừng đếm ngược khi đạt đến 0
                modal.style.display = "none"; // Ẩn modal
                overlay.style.display = "none"; // Ẩn overlay

                // Gửi yêu cầu AJAX để reset số lần nhập sai mật khẩu
                $.ajax({
                    url: resetAttemptsUrl,
                    type: "POST",
                    data: { user_name: userNameInput}, // Thay đổi 'email' thành 'user_name'
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            console.log("Reset attempts successfully.");
                        } else {
                            console.log("Reset attempts failed.");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Reset attempts request failed.");
                    }
                });
            }
        }, 1000); // 1 giây
    }
});
