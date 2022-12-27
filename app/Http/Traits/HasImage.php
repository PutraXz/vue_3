namespace App\Traits;

trait HasImage
{
    public function storeImage($request, $path){
        $img = null;
        if($request->file('file')){
            $img = $request->file('img');
            $img->StoreAs($path, $img->hashName());
        }
        return $img;
    }
}
