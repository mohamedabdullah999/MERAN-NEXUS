<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Client;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending Inquiries', Inquiry::where('status', 'pending')->count())
                ->description('طلبات جديدة لم يتم الرد عليها')
                ->descriptionIcon('heroicon-m-clock')
                ->color('danger'),

            Stat::make('Total Services', Service::count())
                ->description('الخدمات المفعلة في الموقع')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('success'),

            Stat::make('Portfolio Projects', Portfolio::count())
                ->description('إجمالي الأعمال المرفوعة')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('info'),

            Stat::make('Articles & Media', Article::count())
                ->description('المقالات المنشورة')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Total Clients', Client::count())
                ->description('عدد العملاء في قاعدة البيانات')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Total Testimonials', Testimonial::count())
                ->description('عدد الشهادات في قاعدة البيانات')
                ->descriptionIcon('heroicon-m-chat-bubble-oval-left')
                ->color('secondary'),

            Stat::make('Total Inquiries', Inquiry::count())
                ->description('إجمالي الطلبات في قاعدة البيانات')
                ->descriptionIcon('heroicon-m-inbox')
                ->color('primary'),
        ];

    }
}
