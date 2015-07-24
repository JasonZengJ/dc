/**
 * Created by Jason on 5/12/15.
 */

//$POST = function(url,data,token){
//
//    data["_token"] = '{{ csrf_token() }}';
//    $.post(url,data);
//}

$(function() {

    //var data = JSON.parse($('#dish_data').val());

    var dishes = {

        total_amount:0,
        o_totalAmount:$("#totalAmount"),
        carts_data:{},

        init:function(){

            var self = this;

            // 点击菜单列表中的 ＋ 号按钮
            $(".dish .item-operation .add").swipe({

                tap:function(event,target){

                    var $this   = $(this);
                    var $parent = $this.parent();
                    var amount = +$this.siblings('.amount').html();
                    if (amount == 0) {
                        $this.siblings('.minus').css({'display':'inline-block'});
                        $this.siblings('.amount').css({'display':'inline-block'});
                    }
                    $this.siblings('.amount').html(++amount);

                    if (self.carts_data[$parent.data('id')]) {

                        self.carts_data[$parent.data('id')]['amount'] = amount;

                    } else {
                        self.carts_data[$parent.data('id')] = {
                            id:$parent.data('id'),
                            name:$parent.data('name'),
                            price:$parent.data('price'),
                            cateName:$parent.data('catename'),
                            cateId:$parent.data('cateId'),
                            amount:1
                        }
                        self.o_totalAmount.html("点了: "+(++self.total_amount) + " 个");
                    }

                }

            });

            // 点击菜单列表中的 - 号按钮
            $(".dish .item-operation .minus").swipe({

                tap:function(event,target) {

                    var $this  = $(this);
                    var $parent = $this.parent();
                    var amount = +$this.siblings('.amount').html();
                    if (amount == 1) {
                        $this.css({'display': 'none'});
                        $this.siblings('.amount').css({'display': 'none'});
                    }
                    $this.siblings('.amount').html(--amount);

                    if (amount == 0) {

                        delete self.carts_data[$parent.data('id')];
                        self.o_totalAmount.html("总数: "+(--self.total_amount));

                    } else {
                        self.carts_data[$parent.data('id')]['amount'] = amount;
                    }


                }

            });

            // 点击选好了按钮
            $('#confirmOrder').click(function(){
                self.confirm_order();
            });
            //$('span.value').click(self.toggleCart);

        },
        // 确认订单
        confirm_order:function() {

            $('#dishData').val(JSON.stringify(this.carts_data));

            if (this.total_amount > 0) {
                $('#orderForm').submit();
            } else {
                $('#no-dishes-alert').modal();
            }

        },
        toggleCart:function(){

            if($('#cart-panel').hasClass('down'))
            {
                $('#cart-panel,#cart').addClass('up').removeClass('down');
            }

            else
            {
                $('#cart-panel,#cart').addClass('down').removeClass('up');
            }
        }

    };
    dishes.init();

})
