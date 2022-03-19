public function prefecture()
{
    return $this->belongsToMany(Prefecture::class);
}