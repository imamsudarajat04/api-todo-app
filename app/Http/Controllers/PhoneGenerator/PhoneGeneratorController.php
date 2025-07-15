<?php

namespace App\Http\Controllers\PhoneGenerator;

use App\Http\Controllers\Controller;
use App\Models\GeneratedPhoneNumber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhoneGeneratorController extends Controller
{
    public function index()
    {
        $phones = GeneratedPhoneNumber::query()->latest()->paginate(20);
        return view('phone-generator.index', compact('phones'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function generate(Request $request): RedirectResponse
    {
        $request->validate([
            'provider' => 'required|in:telkomsel,xl,axis',
            'count' => 'required|integer|min:1|max:1000',
        ]);

        $prefixes = [
            'telkomsel' => ['0821', '0853'],
            'xl'        => ['0817', '0818', '0819', '0859', '0877', '0878'],
            'axis'      => ['0831', '0832', '0833', '0838'],
        ];

        $numbers = [];

        for ($i = 0; $i < $request->count; $i++) {
            $prefix = $prefixes[$request->provider][array_rand($prefixes[$request->provider])];
            $body = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
            $number = $prefix . $body;

            $numbers[] = [
                'id'         => Str::uuid()->toString(),
                'number'     => $number,
                'provider'   => strtoupper($request->provider),
                'is_active'  => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Avoid duplicates
        $uniqueNumbers = array_filter($numbers, function ($item) {
            return !GeneratedPhoneNumber::query()->where('number', $item['number'])->exists();
        });

        GeneratedPhoneNumber::query()->insert($uniqueNumbers);

        return redirect()->route('phone-generator.index')->with('success', 'Generated successfully.');
    }
}
