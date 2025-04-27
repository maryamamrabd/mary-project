<?php

namespace App\Filament\Widgets;

use App\Models\Appointment;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected function getStats(): array
    {
        $appointments = Appointment::count();
        return [
            Stat::make('Rendez-vous', $appointments)
                ->icon('heroicon-o-calendar')
                ->color('success')
                ->description('Les rendez-vous')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Commandes', Order::count())
                ->icon('heroicon-o-shopping-cart'),
            Stat::make('Produits', Product::count())
                ->icon('heroicon-o-archive-box'),
            Stat::make('Catégories', Category::count())
                ->icon('heroicon-o-rectangle-stack'),
            Stat::make('Messages', Contact::count())
                ->icon('heroicon-o-envelope'),
            Stat::make('Utilisatuers', User::count())
                ->icon('heroicon-o-users'),

        ];
    }
}
