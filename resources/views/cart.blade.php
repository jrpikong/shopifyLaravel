<div id="shopify-section-cart-template" class="shopify-section">
    <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">

        <div>{{$shop}}</div>
        <div class="section-header text-center">
            <h1>Your cart</h1>
        </div>

        <form action="/cart?step=contact_information&amp;method=delivery&amp;checkout%5Bshipping_address%5D%5Bcompany%5D=&amp;checkout%5Bshipping_address%5D%5Baddress2%5D=&amp;checkout%5Bshipping_address%5D%5Bcountry%5D=Indonesia&amp;checkout%5Bshipping_address%5D%5Bprovince%5D=Jakarta&amp;locale=en-AU" method="post" novalidate="" class="cart">
            <table>
                <thead class="cart__row cart__header">
                <tr><th colspan="2">Product</th>
                    <th>Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-right">Total</th>
                </tr></thead>
                <tbody>

                <tr class="cart__row border-bottom line1 cart-flex border-top">
                    <td class="cart__image-wrapper cart-flex-item">
                        <a href="/products/test?variant=6965658877997">
                            <img class="cart__image" src="//cdn.shopify.com/s/files/1/3096/8490/products/bg-03.015b50d_95x95@2x.jpg?v=1519366100" alt="Test">
                        </a>
                    </td>
                    <td class="cart__meta small--text-left cart-flex-item">
                        <div class="list-view-item__title">
                            <a href="/products/test?variant=6965658877997">
                                Test
                            </a>
                        </div>
                        <p class="small--hide">
                            <a href="/cart/change?line=1&amp;quantity=0" class="btn btn--small btn--secondary cart__remove">Remove</a>
                        </p>
                    </td>
                    <td class="cart__price-wrapper cart-flex-item">
                        1.000.000,00
                        <div class="cart__edit medium-up--hide">
                            <button type="button" class="btn btn--secondary btn--small js-edit-toggle cart__edit--active" data-target="line1">
                                <span class="cart__edit-text--edit">Edit</span>
                                <span class="cart__edit-text--cancel">Cancel</span>
                            </button>
                        </div>
                    </td>
                    <td class="cart__update-wrapper cart-flex-item text-right">
                        <a href="/cart/change?line=1&amp;quantity=0" class="btn btn--small btn--secondary cart__remove medium-up--hide">Remove</a>
                        <div class="cart__qty">
                            <label for="updates_6965658877997:0f202d23617bd95392726947ab0cfe35" class="cart__qty-label">Quantity</label>
                            <input class="cart__qty-input" name="updates[]" id="updates_6965658877997:0f202d23617bd95392726947ab0cfe35" value="1" min="0" pattern="[0-9]*" type="number">
                        </div>
                        <input name="update" class="btn btn--small cart__update medium-up--hide" value="Update" type="submit">
                    </td>
                    <td class="text-right small--hide">
                        <div>
                            1.000.000,00
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>

            <footer class="cart__footer">
                <div class="grid">

                    <div class="grid__item text-right small--text-center">
                        <div>
                            <span class="cart__subtotal-title">Subtotal</span>
                            <span class="cart__subtotal">1.000.000,00</span>
                        </div>

                        <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                        <a href="collections/all" class="btn btn--secondary cart__update cart__continue--large small--hide">Continue shopping</a>
                        <input name="update" class="btn btn--secondary cart__update cart__update--large small--hide" value="Update" type="submit">

                    </div>
                </div>
            </footer>
        </form>

    </div>

</div>