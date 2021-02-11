<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lebel')->nullable();
            $table->string('lebel_group')->nullable();
            $table->boolean('is_show_able')->default(1);
            $table->timestamps();
        });
        // DB::table('permissions')->insert([
            
        //     ['name' => 'admin_permission'],

        //     ['name' => 'home'],
        //     ['name' => 'admin.home'],
        //     ['name' => 'daily-sale-report'],
        //     ['name' => 'barcode'],

        //     ['name' => 'brand.add'],
        //     ['name' => 'brand.store'],
        //     ['name' => 'brand.edit'],
        //     ['name' => 'brand.destroy'],
        //     ['name' => 'brand.update'],

        //     ['name' => 'category.add'],
        //     ['name' => 'category.store'],
        //     ['name' => 'category.edit'],
        //     ['name' => 'category.destroy'],
        //     ['name' => 'category.update'],
            
        //     ['name' => 'sub-category.add'],
        //     ['name' => 'sub-category.store'],
        //     ['name' => 'sub-category.edit'],
        //     ['name' => 'sub-category.destroy'],
        //     ['name' => 'sub-category.update'],

        //     ['name' => 'product.add'],
        //     ['name' => 'product.view'],
        //     ['name' => 'product.store'],
        //     ['name' => 'product.edit'],
        //     ['name' => 'product.destroy'],
        //     ['name' => 'product.statusupdate'],
        //     ['name' => 'product.subcategory'],
        //     ['name' => 'product.update'],

        //     ['name' => 'karat.add'],
        //     ['name' => 'karat.store'],
        //     ['name' => 'karat.edit'],
        //     ['name' => 'karat.destroy'],
        //     ['name' => 'karat.update'],

        //     ['name' => 'goldtype.add'],
        //     ['name' => 'goldtype.store'],
        //     ['name' => 'goldtype.edit'],
        //     ['name' => 'goldtype.destroy'],
        //     ['name' => 'goldtype.update'],

        //     ['name' => 'color.add'],
        //     ['name' => 'color.store'],
        //     ['name' => 'color.edit'],
        //     ['name' => 'color.destroy'],
        //     ['name' => 'color.update'],

        //     ['name' => 'weight.add'],
        //     ['name' => 'weight.store'],
        //     ['name' => 'weight.edit'],
        //     ['name' => 'weight.destroy'],
        //     ['name' => 'weight.update'],

        //     ['name' => 'origin.add'],
        //     ['name' => 'origin.store'],
        //     ['name' => 'origin.edit'],
        //     ['name' => 'origin.destroy'],
        //     ['name' => 'origin.update'],

        //     ['name' => 'size.add'],
        //     ['name' => 'size.store'],
        //     ['name' => 'size.edit'],
        //     ['name' => 'size.destroy'],
        //     ['name' => 'size.update'],

        //     ['name' => 'democart.add'],
        //     ['name' => 'democart.index'],
        //     ['name' => 'democart.carts'],
        //     ['name' => 'democart.remove'],
        //     ['name' => 'democart.update'],

        //     ['name' => 'purchase.add'],
        //     ['name' => 'purchase.view'],
        //     ['name' => 'product.find'],
        //     ['name' => 'purchase.addCart'],
        //     ['name' => 'purchase.carts'],
        //     ['name' => 'purchase.cart-remove'],
        //     ['name' => 'purchase.cart-edit'],
        //     ['name' => 'purchase.UpdateCart'],
        //     ['name' => 'purchase.save'],

        //     ['name' => 'invoice.print'],
        //     ['name' => 'purchase.return'],
        //     ['name' => 'purchasereturn.store'],
        //     ['name' => 'invoice.confirmation'],
        //     ['name' => 'invoice.due'],
        //     ['name' => 'sale.invoice.due'],
        //     ['name' => 'invoice.changedate'],
        //     ['name' => 'invoice.duepayment'],


        //     ['name' => 'inventory.status'],
        //     ['name' => 'parties.status'],
        //     ['name' => 'income.status'],
        //     ['name' => 'report.customerSupplierLoad'],
        //     ['name' => 'parties.customerSupplierStatus'],
        //     ['name' => 'invoice.view'],

        //     ['name' => 'stock.view'],

        //     ['name' => 'supplier.add'],
        //     ['name' => 'supplier.store'],
        //     ['name' => 'supplier.update'],
        //     ['name' => 'supplier.delete'],
        //     ['name' => 'supplier.search'],

        //     ['name' => 'employee.add'],
        //     ['name' => 'employee.store'],
        //     ['name' => 'employee.update'],
        //     ['name' => 'employee.delete'],
        //     ['name' => 'employee.search'],

        //     ['name' => 'customer.add'],
        //     ['name' => 'customer.store'],
        //     ['name' => 'customer.update'],
        //     ['name' => 'customer.destroy'],
        //     ['name' => 'customer.edit'],

        //     ['name' => 'purchase.subcategory'],

        //     ['name' => 'localcost.add'],
        //     ['name' => 'localcost.store'],
        //     ['name' => 'localcost.typestore'],
        //     ['name' => 'localcost.storetype'],
        //     ['name' => 'localcost.edit'],
        //     ['name' => 'localcost.updatetype'],

           

        //     ['name' => 'salary.add'],
        //     ['name' => 'salary.store'],
        //     ['name' => 'salary.history'],
        //     ['name' => 'salary.search'],

        //     ['name' => 'sale.barcodelist'],
        //     ['name' => 'sale.view'],
        //     ['name' => 'sale.salesummary'],
        //     ['name' => 'sale.barcode'],
        //     ['name' => 'getWeight'],
        //     ['name' => 'sale.find'],
        //     ['name' => 'sale.barcode-serial'],
        //     ['name' => 'sale.remove'],
        //     ['name' => 'saleRowRemove'],
        //     ['name' => 'sale.return'],
        //     ['name' => 'salereturn.store'],
        //     ['name' => 'sale.store'],
        //     ['name' => 'salecart.update'],
        //     ['name' => 'sale.invoice'],
        //     ['name' => 'sale.addNewInstant'],

        //     ['name' => 'quick.sale'],
        //     ['name' => 'quick.store'],
        //     ['name' => 'lastsale.print'],
        //     ['name' => 'quickSales'],
        //     ['name' => 'invoice.delete'],
        //     ['name' => 'customer.search'],
        //     ['name' => 'cash.status'],
        //     ['name' => 'income_expense.status']
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
