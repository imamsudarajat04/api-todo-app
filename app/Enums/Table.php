<?php

namespace App\Enums;

enum Table: string
{
    case USERS = 'users';
    case PASSWORD_RESET_TOKENS = 'password_reset_tokens';
    case SESSIONS = 'sessions';
    case CACHE = 'cache';
    case CACHE_LOCKS = 'cache_locks';
    case JOBS = 'jobs';
    case JOB_BATCHES = 'job_batches';
    case FAILED_JOBS = 'failed_jobs';
    case TODOS = 'todos';
    case GENERATED_PHONE_NUMBERS = 'generated_phone_numbers';
}
