<?php

namespace App\Enums;

enum PortfolioType: string
{
    case CaseStudy = 'case_study';
    case Technology = 'technology';
    case Tool = 'tool';
    case Methodology = 'methodology';
}
