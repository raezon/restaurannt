#### Database 
you can use where,first,firstOrFail
#### conditions
forelse,empty,endforelse
#### format
avec carbon
#### Require auth
public function construct()
{
    $this-middleware("auth");
     $this-middleware("auth")->except('bar');
}
#### Require auth on view
@auth
@endauth
@guest
@endguest
c'est quoi une facade
{{Auth::user()->name}}
il dit plator
#### Gates Authorization (role admin)
#### Create mail with markdown
  php artisan make:mail testMarkDownEmail -m emails.markdown-test
#### Concepts a revoir
notification,event,relations in laravels,middelware route
#### Split web into several
watch formation 8:27
