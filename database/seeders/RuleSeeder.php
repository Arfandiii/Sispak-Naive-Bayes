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
            ['R01', 'K01', ['KP01', 'KP02', 'KP03', 'KP04']],
            ['R02', 'K02', ['KP05', 'KP06', 'KP07']],
            ['R03', 'K03', ['KP07', 'KP08', 'KP09', 'KP10']],
            ['R04', 'K04', ['KP04', 'KP08', 'KP09', 'KP10', 'KP12', 'KP13']],
            ['R05', 'K05', ['KP11', 'KP14', 'KP15', 'KP16', 'KP17', 'KP18']],
            ['R06', 'K06', ['KP11', 'KP19', 'KP20', 'KP21']],
            ['R07', 'K07', ['KP22', 'KP23', 'KP24', 'KP25']],
            ['R08', 'K08', ['KP25', 'KP26', 'KP27', 'KP28', 'KP29']],
            ['R09', 'K09', ['KP30', 'KP31', 'KP32', 'KP33', 'KP34']],
            ['R10', 'K10', ['KP11', 'KP35', 'KP36', 'KP37', 'KP38']],
            ['R11', 'K11', ['KP11', 'KP12', 'KP39', 'KP40']],
        ];
        
        foreach ($rules as [$kodeRule, $kodeKarir, $kodePernyataanList]) {
            $career = Career::where('kode_karir', $kodeKarir)->first();

            if (!$career) {
                $this->command->warn("Karir dengan kode $kodeKarir tidak ditemukan.");
                continue;
            }

            foreach ($kodePernyataanList as $kodePernyataan) {
                $statement = CareerStatement::where('kode_pernyataan', $kodePernyataan)->first();

                if (!$statement) {
                    $this->command->warn("Pernyataan dengan kode $kodePernyataan tidak ditemukan.");
                    continue;
                }

                Rule::firstOrCreate([
                    'kode_rule' => $kodeRule,
                    'career_id' => $career->id,
                    'career_statement_id' => $statement->id,
                ]);
            }
        }
    }
}
