<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Giỏ hàng</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td colspan="7">
                            <a href="HomeController/SayHi">
                            <button type="button" class="btn btn-primary">Tiếp tục mua hàng</button>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <script>
                        let data = <?php echo $data["Product"];?>;

                        for(let i = 0; i < data.length; i++)
                        {
                            for(let j = i + 1; j < data.length; j++)
                            {
                                if(data[i][0]['id'] == data[j][0]['id'])
                                {
                                    data.splice(j, 1)
                                }
                            }
                        }

                        data.forEach(member => createItem(member))

                        function createItem(member)
                        {
                            let number = member[1]
                            let price = member[0].price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                            let total_price = (member[0].price * number).toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                            let item = `
                            <tr>
                                <td><img src="/Lab_09_10/public/${member[0].image}" style="max-height: 50px"></td>
                                <td>${data.indexOf(member) + 1}</td>
                                <td>${member[0].name}</td>
                                <td><input type="number" value="${number}"></td>
                                <td><p>${price}</p></td>
                                <td>${total_price}</td>
                                <td><button type="button" class="btn btn-danger">Xóa</button></td>
                            </tr>
                            `;
                            $("#table-body").append(item);
                        }

                        

                        function deleteCart()
                        {
                            $.post(`/Lab_09_10/CartController/deleteCart/`,function(data, status) {
                                console.log(status)
                                console.log(data)
                            })
                            location.reload();
                        }
                        
                        function purchase()
                        {
                            $('#confirm-removal-modal').modal({show: true});
                            var delayInMilliseconds = 4000; //1 second

                            setTimeout(function() {
                                deleteCart();
                            }, delayInMilliseconds);
                            
                        }

                    </script>
            <!-- <tr>

                <td><img src="https://cdn.tgdd.vn/Products/Images/42/103404/samsung-galaxy-j7-pro-2323-400x460.png" style="max-height: 50px"></td>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td><input type="number" value="1"></td>
                <td><p>125,000 đ</p></td>
                <td>125,000 đ</td>
                <td><button type="button" class="btn btn-danger">Xóa</button></td>
            </tr> -->
            <tr>
                <td colspan="7" style="text-align: right">
                    <button type="button" class="btn btn-secondary" onclick="deleteCart()">Xóa giỏ hàng</button>
                    <button type="button" class="btn btn-success" onclick="purchase()">Thanh toán</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Confirm Removal Modal -->
    <div class="modal fade" id="confirm-removal-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn đã thanh toán thành công</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="delete-button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div><!-- Confirm Removel modal -->
    </body>
</html>