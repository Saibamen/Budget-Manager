<?php

use App\Models\Budget;
use App\Models\Type;
use Illuminate\Database\Seeder;

class BudgetsTableSeeder extends Seeder {

    public function run() {
        $dataset = [
        	/*
        	 *	Czynsz
        	 */
            ["id" => 1, "name" => "Czynsz wrzesień", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 740, "date" => "2015-09-20", "user_id" => 1, "comment" => NULL],
            ["id" => 2, "name" => "Czynsz październik", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 740, "date" => "2015-10-20", "user_id" => 1, "comment" => NULL],
            ["id" => 3, "name" => "Czynsz listopad", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 740, "date" => "2015-11-20", "user_id" => 1, "comment" => NULL],
            ["id" => 4, "name" => "Czynsz grudzień", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 740, "date" => "2015-12-20", "user_id" => 1, "comment" => NULL],
            ["id" => 5, "name" => "Czynsz styczeń", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-01-20", "user_id" => 1, "comment" => "Podwyżka"],
            ["id" => 6, "name" => "Czynsz luty", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-02-20", "user_id" => 1, "comment" => NULL],
            ["id" => 7, "name" => "Czynsz marzec", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-03-20", "user_id" => 1, "comment" => NULL],
            ["id" => 8, "name" => "Czynsz kwiecień", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-04-20", "user_id" => 1, "comment" => NULL],
            ["id" => 9, "name" => "Czynsz maj", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-05-20", "user_id" => 1, "comment" => NULL],
            ["id" => 10, "name" => "Czynsz czerwiec", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-06-20", "user_id" => 1, "comment" => NULL],
            ["id" => 11, "name" => "Czynsz lipiec", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-07-20", "user_id" => 1, "comment" => NULL],
            ["id" => 12, "name" => "Czynsz sierpień", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-08-20", "user_id" => 1, "comment" => NULL],
            ["id" => 13, "name" => "Czynsz wrzesień", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-09-20", "user_id" => 1, "comment" => NULL],
            ["id" => 14, "name" => "Czynsz październik", "source_id" => 1, "type_id" => Type::EXPENDITURE, "value" => 750, "date" => "2016-10-20", "user_id" => 1, "comment" => NULL],

            /*
             *	Wypłata od pracodawcy - Kasia
             */
            ["id" => 15, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2015-09-10", "user_id" => 2, "comment" => "Pierwsza wypłata"],
            ["id" => 16, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2015-10-09", "user_id" => 2, "comment" => NULL],
            ["id" => 17, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2015-11-10", "user_id" => 2, "comment" => NULL],
            ["id" => 18, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2015-12-10", "user_id" => 2, "comment" => NULL],
            ["id" => 19, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2016-01-08", "user_id" => 2, "comment" => NULL],
            ["id" => 20, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 10000, "date" => "2016-02-10", "user_id" => 2, "comment" => NULL],
            ["id" => 21, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-03-10", "user_id" => 2, "comment" => "Awans :)"],
            ["id" => 22, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-04-08", "user_id" => 2, "comment" => NULL],
            ["id" => 23, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-05-10", "user_id" => 2, "comment" => NULL],
            ["id" => 24, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-06-10", "user_id" => 2, "comment" => NULL],
            ["id" => 25, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-07-08", "user_id" => 2, "comment" => NULL],
            ["id" => 26, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-08-10", "user_id" => 2, "comment" => NULL],
            ["id" => 27, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-09-09", "user_id" => 2, "comment" => NULL],
            ["id" => 28, "name" => "Wypłata Kasia", "source_id" => 2, "type_id" => Type::INCOME, "value" => 15000, "date" => "2016-10-10", "user_id" => 2, "comment" => NULL],

            /*
             *	Wypłata od pracodawcy - Tomek
             */
            ["id" => 29, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2015-09-10", "user_id" => 1, "comment" => NULL],
            ["id" => 30, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2015-10-09", "user_id" => 1, "comment" => NULL],
            ["id" => 31, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2015-11-10", "user_id" => 1, "comment" => NULL],
            ["id" => 32, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2015-12-10", "user_id" => 1, "comment" => NULL],
            ["id" => 33, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2016-01-08", "user_id" => 1, "comment" => NULL],
            ["id" => 34, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2016-02-10", "user_id" => 1, "comment" => NULL],
            ["id" => 35, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2016-03-10", "user_id" => 1, "comment" => NULL],
            ["id" => 36, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2016-04-08", "user_id" => 1, "comment" => NULL],
            ["id" => 37, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 5000, "date" => "2016-05-10", "user_id" => 1, "comment" => NULL],
            ["id" => 38, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 7000, "date" => "2016-06-10", "user_id" => 1, "comment" => "Awans"],
            ["id" => 39, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 7000, "date" => "2016-07-08", "user_id" => 1, "comment" => NULL],
            ["id" => 40, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 7000, "date" => "2016-08-10", "user_id" => 1, "comment" => NULL],
            ["id" => 41, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 7000, "date" => "2016-09-09", "user_id" => 1, "comment" => NULL],
            ["id" => 42, "name" => "Wypłata Tomek", "source_id" => 9, "type_id" => Type::INCOME, "value" => 7000, "date" => "2016-10-10", "user_id" => 1, "comment" => NULL],

            /*
             *	Wypłata - AdSense
             */
            ["id" => 43, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 40, "date" => "2016-05-16", "user_id" => 1, "comment" => NULL],
            ["id" => 44, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 42, "date" => "2016-06-16", "user_id" => 1, "comment" => NULL],
            ["id" => 45, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 45, "date" => "2016-07-15", "user_id" => 1, "comment" => NULL],
            ["id" => 46, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 61, "date" => "2016-08-15", "user_id" => 1, "comment" => NULL],
            ["id" => 47, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 80, "date" => "2016-09-16", "user_id" => 1, "comment" => NULL],
            ["id" => 48, "name" => "Google AdSense", "source_id" => 6, "type_id" => Type::INCOME, "value" => 100, "date" => "2016-10-17", "user_id" => 1, "comment" => NULL],

            /*
             *	Kino
             */
            ["id" => 49, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2015-09-25", "user_id" => 1, "comment" => NULL],
            ["id" => 50, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2015-10-19", "user_id" => 1, "comment" => NULL],
            ["id" => 51, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2015-11-25", "user_id" => 1, "comment" => NULL],
            ["id" => 52, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2015-12-20", "user_id" => 1, "comment" => NULL],
            ["id" => 53, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-01-25", "user_id" => 1, "comment" => NULL],
            ["id" => 54, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-02-17", "user_id" => 1, "comment" => NULL],
            ["id" => 55, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-03-22", "user_id" => 1, "comment" => NULL],
            ["id" => 56, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-04-25", "user_id" => 1, "comment" => NULL],
            ["id" => 57, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-05-23", "user_id" => 1, "comment" => NULL],
            ["id" => 58, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-06-12", "user_id" => 1, "comment" => "Awans"],
            ["id" => 59, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-07-25", "user_id" => 1, "comment" => NULL],
            ["id" => 60, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-08-11", "user_id" => 1, "comment" => NULL],
            ["id" => 61, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-09-25", "user_id" => 1, "comment" => NULL],
            ["id" => 62, "name" => "Multikino", "source_id" => 3, "type_id" => Type::EXPENDITURE, "value" => 45, "date" => "2016-10-14", "user_id" => 1, "comment" => NULL],

            ["id" => 63, "name" => "Remont łazienki", "source_id" => 7, "type_id" => Type::EXPENDITURE, "value" => 10854, "date" => "2016-02-14", "user_id" => 2, "comment" => "Remont w walentynki :D"],
            ["id" => 64, "name" => "Remont generalny", "source_id" => 7, "type_id" => Type::EXPENDITURE, "value" => 52684.13, "date" => "2016-09-23", "user_id" => 1, "comment" => NULL],

            /*
             *	Zakupy
             */
            ["id" => 65, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 849.43, "date" => "2015-09-01", "user_id" => 2, "comment" => NULL],
            ["id" => 66, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 912.05, "date" => "2015-09-12", "user_id" => 1, "comment" => NULL],
            ["id" => 67, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 803.87, "date" => "2015-09-24", "user_id" => 2, "comment" => NULL],
            ["id" => 68, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 827.33, "date" => "2015-10-01", "user_id" => 1, "comment" => NULL],
            ["id" => 69, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 902.55, "date" => "2015-10-12", "user_id" => 1, "comment" => NULL],
            ["id" => 70, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 823.47, "date" => "2015-10-24", "user_id" => 1, "comment" => NULL],
            ["id" => 71, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 887.39, "date" => "2015-11-01", "user_id" => 1, "comment" => NULL],
            ["id" => 72, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 982.85, "date" => "2015-11-12", "user_id" => 2, "comment" => NULL],
            ["id" => 73, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 873.87, "date" => "2015-11-24", "user_id" => 1, "comment" => NULL],
            ["id" => 74, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 767.92, "date" => "2015-12-01", "user_id" => 2, "comment" => NULL],
            ["id" => 75, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 992.84, "date" => "2015-12-12", "user_id" => 2, "comment" => NULL],
            ["id" => 76, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 845.83, "date" => "2015-12-24", "user_id" => 2, "comment" => NULL],
            ["id" => 77, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 837.32, "date" => "2016-01-01", "user_id" => 2, "comment" => NULL],
            ["id" => 78, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 912.64, "date" => "2016-01-12", "user_id" => 1, "comment" => NULL],
            ["id" => 79, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 812.43, "date" => "2016-01-24", "user_id" => 2, "comment" => NULL],
            ["id" => 80, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 932.29, "date" => "2016-02-01", "user_id" => 2, "comment" => NULL],
            ["id" => 81, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 902.64, "date" => "2016-02-12", "user_id" => 1, "comment" => NULL],
            ["id" => 82, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 1002.13, "date" => "2016-02-24", "user_id" => 1, "comment" => NULL],
            ["id" => 83, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 949.29, "date" => "2016-03-01", "user_id" => 2, "comment" => NULL],
            ["id" => 84, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 912.44, "date" => "2016-03-12", "user_id" => 2, "comment" => NULL],
            ["id" => 85, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 904.13, "date" => "2016-03-24", "user_id" => 2, "comment" => NULL],
            ["id" => 86, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 989.89, "date" => "2016-04-01", "user_id" => 1, "comment" => NULL],
            ["id" => 87, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 918.84, "date" => "2016-04-12", "user_id" => 1, "comment" => NULL],
            ["id" => 88, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 984.83, "date" => "2016-04-24", "user_id" => 2, "comment" => NULL],
            ["id" => 89, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 939.38, "date" => "2016-05-01", "user_id" => 1, "comment" => NULL],
            ["id" => 90, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 938.83, "date" => "2016-05-12", "user_id" => 1, "comment" => NULL],
            ["id" => 91, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 983.33, "date" => "2016-05-24", "user_id" => 2, "comment" => NULL],
            ["id" => 92, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 959.35, "date" => "2016-06-01", "user_id" => 2, "comment" => NULL],
            ["id" => 93, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 935.83, "date" => "2016-06-12", "user_id" => 1, "comment" => NULL],
            ["id" => 94, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 952.53, "date" => "2016-06-24", "user_id" => 2, "comment" => NULL],
            ["id" => 95, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 956.64, "date" => "2016-07-01", "user_id" => 1, "comment" => NULL],
            ["id" => 96, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 965.83, "date" => "2016-07-12", "user_id" => 1, "comment" => NULL],
            ["id" => 97, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 958.63, "date" => "2016-07-24", "user_id" => 1, "comment" => NULL],
            ["id" => 98, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 947.44, "date" => "2016-08-01", "user_id" => 2, "comment" => NULL],
            ["id" => 99, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 945.84, "date" => "2016-08-12", "user_id" => 1, "comment" => NULL],
            ["id" => 100, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 954.43, "date" => "2016-08-24", "user_id" => 2, "comment" => NULL],
            ["id" => 101, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 967.64, "date" => "2016-09-01", "user_id" => 2, "comment" => NULL],
            ["id" => 102, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 996.64, "date" => "2016-09-12", "user_id" => 2, "comment" => NULL],
            ["id" => 103, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 964.63, "date" => "2016-09-24", "user_id" => 2, "comment" => NULL],
            ["id" => 104, "name" => "Zakupy Tesco", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 962.64, "date" => "2016-10-01", "user_id" => 1, "comment" => NULL],
            ["id" => 105, "name" => "Zakupy Auchan", "source_id" => 5, "type_id" => Type::EXPENDITURE, "value" => 926.04, "date" => "2016-10-12", "user_id" => 2, "comment" => NULL],

            /*
             *	Środki czystości
             */
            ["id" => 106, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 212.04, "date" => "2015-09-19", "user_id" => 2, "comment" => NULL],
            ["id" => 107, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 232.49, "date" => "2015-11-16", "user_id" => 2, "comment" => NULL],
            ["id" => 108, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 192.12, "date" => "2016-01-20", "user_id" => 2, "comment" => NULL],
            ["id" => 109, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 209.89, "date" => "2016-03-21", "user_id" => 2, "comment" => NULL],
            ["id" => 110, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 189.89, "date" => "2016-05-18", "user_id" => 2, "comment" => NULL],
            ["id" => 111, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 195.89, "date" => "2016-07-22", "user_id" => 2, "comment" => NULL],
            ["id" => 112, "name" => "Chemia", "source_id" => 8, "type_id" => Type::EXPENDITURE, "value" => 216.27, "date" => "2016-07-22", "user_id" => 2, "comment" => NULL],
        ];

        foreach($dataset as $data) {
            Budget::firstOrCreate($data);
        }
    }

}
