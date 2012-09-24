{include file="header.tpl"}

<div id = 'sadrzaj'> 
{if (isset($successfulActivation))} <span class = 'uspjesno'> {$successfulActivation} </span> {/if}
{if (isset($updateSuccessful))}<span class = 'uspjesno'> Uspješna promjena podataka. Neke promjene su vidljive automatski dok se za neke potrebno ponovo ulogirati. </span>{/if}
{if (isset($rejectedActivation))} <span class = 'greska'> {$rejectedActivation} </span> {/if}
{if (isset($activationTimedOut))} <span class = 'greska'> {$activationTimedOut} </span> {/if}
{if (isset($successCC))} <span class = 'uspjesno'> {$successCC} </span> {/if}
{if (isset($insertSuccessful))} <span class = 'uspjesno'> {$insertSuccessful} </span>{/if}
{if (isset($newPass))} <span class = 'uspjesno'> {$newPass} </span>{/if}
{if (isset($successPurchase))} <span class = 'uspjesno'> {$successPurchase} </span> {/if}
{if (isset($purchaseError))} <span class = 'greska'> {$purchaseError} </span> {/if}
{if (isset($failure))} <span class = 'greska'> {$failure} </span> {/if}
{if (isset($deniedAccess))}<span class = 'greska'> {$deniedAccess}</span>{/if}
{if (isset($successfullAddingToCart))} <span class = 'uspjesno'> {$successfullAddingToCart} </span>{/if}
{if (isset($changeEventSuccess))} <span class = 'uspjesno'> {$changeEventSuccess} </span>{/if}
</div>

{include file="footer.tpl"}