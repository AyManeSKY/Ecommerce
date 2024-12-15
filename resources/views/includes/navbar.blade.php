@extends('layaouts.app')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pizzas.index') }}">Pizzas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('suggestions.index') }}">Suggestions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sales_data.index') }}">Sales</a>
            </li>
        </ul>
    </div>
</nav>
