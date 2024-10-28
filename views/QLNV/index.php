<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Quản lý nhân viên</title>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
    <link rel="stylesheet" href="css/QLNV/style.css">  
    <style>  
    </style>  
</head>  
<body>  

    <?php  
        require('layout/navqlchuoi.php');  
    ?>  

    <div class="main">   
        <div class="title">  
            <h2>Quản lý nhân viên</h2>   
        </div>   
        
        <div class="qlnv-search-bar">  
            <form method="POST">  
                <input type="text" name="search" placeholder="Nhập nhân viên cần tìm" />  
                <button type="submit"><i class="fas fa-search"></i> Tìm</button> 
            </form>  
        </div>  

        <div class="branch-selector">  
            <label for="branch">Chọn chi nhánh:</label>  
            <select id="branch" name="branch" onchange="this.form.submit()">  
                <option value="branch1">Chi nhánh 1</option>  
                <option value="branch2">Chi nhánh 2</option>  
                <option value="branch3">Chi nhánh 3</option>  
                <option value="branch3">Chi nhánh 4</option> 
                <option value="branch3">Chi nhánh 5</option> 
            </select>  
        </div>  

        <div class="title-dsnv">  
            <h3>Danh sách nhân viên</h3>   
        </div>   

        <div class="list-dsnv">  
            <table class="employee-list">  
                <thead>  
                    <tr>  
                        <th></th>  
                        <th>Tên nhân viên</th>  
                        <th>Chức vụ</th>  
                        <th>Ca làm</th>  
                        <th>Thao tác</th>  
                    </tr>  
                </thead>  
                <tbody id="employee-list">  
                    <tr>  
                        <td><i class='fas fa-user'></i></td>  
                        <td>Nguyễn Văn A</td>  
                        <td>Nhân Viên</td>  
                        <td>Ca 1</td>  
                        <td>  
                            <a href="javascript:void(0);" onclick="toggleDetailForm()">Xem chi tiết</a>                        |  
                            <a href='edit.php?id=1'>Sửa</a> |  
                            <a href='delete.php?id=1' onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>  
                        </td>  
                    </tr>  
                    <tr>  
                        <td><i class='fas fa-user'></i></td>  
                        <td>Trần Thị B</td>  
                        <td>Nhân viên</td>  
                        <td>Ca 2</td>  
                        <td>  
                            <a href="javascript:void(0);" onclick="toggleDetailForm()">Xem chi tiết</a>                        |  
                            <a href='edit.php?id=2'>Sửa</a> |  
                            <a href='delete.php?id=1' onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>  
                        </td>  
                    </tr> 
                    <tr>  
                        <td><i class='fas fa-user'></i></td>  
                        <td>Phạm Thị Ba</td>  
                        <td>Nhân viên Bếp</td>  
                        <td>Ca 1</td>  
                        <td>  
                            <a href="javascript:void(0);" onclick="toggleDetailForm()">Xem chi tiết</a>                        |  
                            <a href='edit.php?id=2'>Sửa</a> |  
                            <a href='delete.php?id=1' onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>  
                        </td>  
                    </tr> 
                    <tr>  
                        <td><i class='fas fa-user'></i></td>  
                        <td>Trần Thanh An</td>  
                        <td>Nhân viên Bếp</td>  
                        <td>Ca 1</td>  
                        <td>  
                            <a href="javascript:void(0);" onclick="toggleDetailForm()">Xem chi tiết</a>                        |  
                            <a href='edit.php?id=2'>Sửa</a> |  
                            <a href='delete.php?id=1' onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>  
                        </td>  
                    </tr>  
                </tbody>  
            </table>  
        </div>  

        <!-- thêm mới nhân viên -->
        <div class="add-NV">  
            <button class="add-employee" onclick="toggleForm()">Thêm mới nhân viên</button>   
        </div>  

        <div class="overlay" id="overlay" onclick="toggleForm()"></div>  
        
        <div class="add-employee-form" id="employeeForm">  
            <h4>Thêm mới nhân viên</h4>  
            <input type="text" id="employeeCode" placeholder="Mã nhân viên" required />  
            <input type="text" id="employeeName" placeholder="Tên nhân viên" required />  
            <input type="date" id="employeeBirthday" placeholder="Ngày sinh" required />  
            <select id="employeeGender" required>  
                <option value="">Giới tính</option>  
                <option value="male">Nam</option>  
                <option value="female">Nữ</option>  
            </select>  
            <input type="text" id="employeeAddress" placeholder="Địa chỉ" required />  
            <input type="email" id="employeeEmail" placeholder="Email" required />  
            <input type="text" id="employeePhone" placeholder="Số điện thoại" required />  
            <input type="text" id="employeePosition" placeholder="Chức vụ" required />  
            <select id="branch" required>  
                <option value="">Chi nhánh</option>  
                <option value="branch1">Chi nhánh 1</option>  
                <option value="branch2">Chi nhánh 2</option>  
                <option value="branch3">Chi nhánh 3</option>  
            </select>  
            <button onclick="addEmployee()">Lưu</button>  
        </div>  

        <div class="overlay" id="overlayDetail" onclick="toggleDetailForm()" style="display: none;"></div>
        <div class="employee-detail" id="employeeDetail">  
            <h3>Chi tiết nhân viên</h3>  

            <div class="form-group">
                <label for="employeeNameDetail">Tên nhân viên</label>
                <input type="text" id="employeeNameDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeeBirthdayDetail">Ngày sinh</label>
                <input type="text" id="employeeBirthdayDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeeGenderDetail">Giới tính</label>
                <input type="text" id="employeeGenderDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeeAddressDetail">Địa chỉ</label>
                <textarea id="employeeAddressDetail" rows="3" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="employeeEmailDetail">Email</label>
                <input type="email" id="employeeEmailDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeePhoneDetail">Số điện thoại</label>
                <input type="text" id="employeePhoneDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="employeePositionDetail">Chức vụ</label>
                <input type="text" id="employeePositionDetail" value="" readonly>
            </div>

            <div class="form-group">
                <label for="branchDetail">Chi nhánh</label>
                <input type="text" id="branchDetail" value="" readonly>
            </div>

            <div class="back-button-view">
                <button onclick="toggleDetailForm()">Quay lại</button>
            </div>
        </div>
    </div>  
</body>
<script src="js/QLNV/jsQLNV.js"></script>
