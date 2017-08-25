<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*AMASH BO AWAYA KA FOREIGN KEYAKAN DISABLE BKAYN LA KATY INSERT KRDN CHWNKA KESHA DRWST AKA*/
        DB::statement('SET FOREIGN_KEY_CHECKS = 0 ');

        /* AMA BO AWAY GAR HAR KATE (  SEED  )MAN KRD DATABSEAKA BATAL BETAWA W INJA DATA TAZAKAN BXATA NAWY  */
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate(); /* LABAR AWAY AMA PIVOT TABLEA W MODELY NYIA BOYA BAM SHEWAYA ATWNYN PEY BGAYN */

        /* AM VARIABLEANA TANHA AW NRXANAY TYAYA KA AMANWE CHANMAN BO AW MODELA DRWST BKA
            WATA AMANWE 200 USER DRWST BKAYN WA HARAWAHA
         */
        $userQuantity = 1000;
        $categoryQuantity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

        factory(User::class , $userQuantity)->create();

        factory(Category::class , $categoryQuantity)->create();

        factory(Product::class , $productQuantity)->create()->each(
            function ($product){
                $category  = Category::all()->random(mt_rand(1 ,5))->pluck('id');
                $product->categories()->attach($category);
            }
        );

        factory(Transaction::class , $transactionQuantity)->create();

    }
}
