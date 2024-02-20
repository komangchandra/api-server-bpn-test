<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'npm' => $this->student_number,
            'nama_mahasiswa' => $this->student_name,
            'jurusan' => $this->major->major_name,
            'alamat' => $this->address,
            'email' => $this->email,
            'nomor_hp' => $this->phone_number
        ];
    }
}
