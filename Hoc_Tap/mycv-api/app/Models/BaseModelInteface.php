<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseModelInterface
{
    // ==================== QUERY ====================

    /**
     * Lấy tất cả bản ghi
     */
    public static function getAll(array $columns = ['*']): Collection;

    /**
     * Lấy danh sách có phân trang
     */
    public static function getPaginated(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator;

    /**
     * Tìm theo ID
     */
    public static function findById(int|string $id, array $columns = ['*']): ?static;

    /**
     * Tìm theo ID hoặc throw exception
     */
    public static function findByIdOrFail(int|string $id, array $columns = ['*']): static;

    /**
     * Tìm theo nhiều điều kiện (WHERE)
     */
    public static function findByConditions(array $conditions, array $columns = ['*']): Collection;

    /**
     * Tìm bản ghi đầu tiên theo điều kiện
     */
    public static function findFirstByConditions(array $conditions, array $columns = ['*']): ?static;

    /**
     * Tìm theo một cột cụ thể
     */
    public static function findByColumn(string $column, mixed $value, array $columns = ['*']): Collection;

    /**
     * Tìm bản ghi đầu tiên theo một cột
     */
    public static function findFirstByColumn(string $column, mixed $value, array $columns = ['*']): ?static;

    /**
     * Tìm theo nhiều IDs
     */
    public static function findByIds(array $ids, array $columns = ['*']): Collection;

    // ==================== CREATE / UPDATE / DELETE ====================

    /**
     * Tạo mới bản ghi
     */
    public static function createRecord(array $data): static;

    /**
     * Tạo nhiều bản ghi cùng lúc
     */
    public static function createMany(array $records): bool;

    /**
     * Cập nhật bản ghi theo ID
     */
    public static function updateById(int|string $id, array $data): bool;

    /**
     * Tạo mới hoặc cập nhật (upsert)
     */
    public static function updateOrCreateRecord(array $conditions, array $data): static;

    /**
     * Xóa bản ghi theo ID (soft delete nếu model có dùng)
     */
    public static function deleteById(int|string $id): bool;

    /**
     * Xóa nhiều bản ghi theo IDs
     */
    public static function deleteByIds(array $ids): int;

    /**
     * Xóa cứng (force delete) theo ID
     */
    public static function forceDeleteById(int|string $id): bool;

    /**
     * Khôi phục bản ghi đã soft delete
     */
    public static function restoreById(int|string $id): bool;

    // ==================== AGGREGATE ====================

    /**
     * Đếm tổng số bản ghi
     */
    public static function countAll(): int;

    /**
     * Đếm theo điều kiện
     */
    public static function countByConditions(array $conditions): int;

    /**
     * Kiểm tra tồn tại theo ID
     */
    public static function existsById(int|string $id): bool;

    /**
     * Kiểm tra tồn tại theo điều kiện
     */
    public static function existsByConditions(array $conditions): bool;

    // ==================== SEARCH / FILTER ====================

    /**
     * Tìm kiếm full-text theo nhiều cột
     */
    public static function search(string $keyword, array $searchableColumns): Collection;

    /**
     * Lấy dữ liệu với filter, sort, paginate động
     */
    public static function getFiltered(
        array  $filters = [],
        string $sortBy = 'created_at',
        string $sortDir = 'desc',
        int    $perPage = 15
    ): LengthAwarePaginator;

    // ==================== RELATIONSHIP ====================

    /**
     * Lấy tất cả kèm eager loading relationships
     */
    public static function getWithRelations(array $relations, array $columns = ['*']): Collection;

    /**
     * Tìm theo ID kèm eager loading
     */
    public static function findByIdWithRelations(int|string $id, array $relations): ?static;

    // ==================== UTILITY ====================

    /**
     * Lấy danh sách key => value cho dropdown/select box
     */
    public static function getSelectOptions(string $valueColumn = 'id', string $labelColumn = 'name'): array;

    /**
     * Chuyển model sang array (chỉ fillable fields)
     */
    public function toSafeArray(): array;

    /**
     * Lấy danh sách cột fillable của model
     */
    public static function getFillableColumns(): array;

    /**
     * Kiểm tra model có dùng SoftDelete không
     */
    public static function hasSoftDelete(): bool;
}