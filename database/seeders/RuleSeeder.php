<?php

namespace Database\Seeders;

use App\Models\Rule;
use App\Models\Career;
use App\Models\CareerStatement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            ['K01', ['KP01', 'KP02', 'KP03', 'KP04']],
            ['K02', ['KP05', 'KP06', 'KP07']],
            ['K03', ['KP07', 'KP08', 'KP09', 'KP10']],
            ['K04', ['KP04', 'KP08', 'KP09', 'KP10', 'KP12', 'KP13']],
            ['K05', ['KP11', 'KP14', 'KP15', 'KP16', 'KP17', 'KP18']],
            ['K06', ['KP11', 'KP19', 'KP20', 'KP21']],
            ['K07', ['KP22', 'KP23', 'KP24', 'KP25']],
            ['K08', ['KP25', 'KP26', 'KP27', 'KP28', 'KP29']],
            ['K09', ['KP30', 'KP31', 'KP32', 'KP33', 'KP34']],
            ['K10', ['KP11', 'KP35', 'KP36', 'KP37', 'KP38']],
            ['K11', ['KP11', 'KP12', 'KP39', 'KP40']],
        ];

        foreach ($rules as [$kodeKarir, $kodePernyataanList]) {
            $career = Career::where('kode_karir', $kodeKarir)->first();

            foreach ($kodePernyataanList as $kodePernyataan) {
                $statement = CareerStatement::where('kode_pernyataan', $kodePernyataan)->first();

                if ($career && $statement) {
                    Rule::create([
                        'career_id' => $career->id,
                        'career_statement_id' => $statement->id,
                    ]);
                }
            }
        }
    }
}
