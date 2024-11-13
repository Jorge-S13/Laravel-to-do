<?php

namespace App\Http\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *      path="/api/todos",
 *      summary="Создание новой задачи",
 *      tags={"ToDo"},
 *
 *     @OA\RequestBody(
 *      @OA\JsonContent(
 *          allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="title",type="string",example="Some title"),
 *                  @OA\Property(property="description",type="string",example="Some description"),
 *              )
 *          }
 *      )
 *     ),
 *
 *     @OA\Response(
 *      response=200,
 *      description="OK",
 *      @OA\JsonContent(
 *          @OA\Property(property="id",type="integer",example="1"),
 *               @OA\Property(property="title",type="string",example="Some title"),
 *               @OA\Property(property="description",type="string",example="Some description"),
 *               @OA\Property(property="completed",type="bool",example="false"),
 *               @OA\Property(property="user_id",type="integer",example="1"),
 *               @OA\Property(property="created_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *               @OA\Property(property="updated_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *      ),
 *     ),
 * ),
 *
 * @OA\Get(
 *       path="/api/todos",
 *       summary="Список задач",
 *       tags={"ToDo"},
 *
 *      @OA\Response(
 *       response=200,
 *       description="OK",
 *       @OA\JsonContent(
 *           @OA\Property(property="",type="array",@OA\Items(
 *              @OA\Property(property="id",type="integer",example="1"),
 *              @OA\Property(property="title",type="string",example="Some title"),
 *              @OA\Property(property="description",type="string",example="Some description"),
 *              @OA\Property(property="completed",type="bool",example="false"),
 *              @OA\Property(property="user_id",type="integer",example="1"),
 *              @OA\Property(property="created_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *              @OA\Property(property="updated_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *           )),
 *       ),
 *      ),
 *  ),
 * @OA\Get(
 *        path="/api/todos/{todo}",
 *        summary="Единичная задача",
 *        tags={"ToDo"},
 *       @OA\Parameter(
 *           description="ID задачи",
 *           in="path",
 *           name="todo",
 *           required=true,
 *           example=1,
 *       ),
 *       @OA\Response(
 *        response=200,
 *        description="OK",
 *        @OA\JsonContent(
 *               @OA\Property(property="id",type="integer",example="1"),
 *               @OA\Property(property="title",type="string",example="Some title"),
 *               @OA\Property(property="description",type="string",example="Some description"),
 *               @OA\Property(property="completed",type="bool",example="false"),
 *               @OA\Property(property="user_id",type="integer",example="1"),
 *               @OA\Property(property="created_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *               @OA\Property(property="updated_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *        ),
 *       ),
 *   ),
 *
 * @OA\Patch(
 *         path="/api/todos/{todo}",
 *         summary="Обновление задачи",
 *         tags={"ToDo"},
 *        @OA\Parameter(
 *            description="ID задачи",
 *            in="path",
 *            name="todo",
 *            required=true,
 *            example=1,
 *        ),
 *       @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="title",type="string",example="Edited title"),
 *                       @OA\Property(property="description",type="string",example="Edited description"),
 *                       @OA\Property(property="completed",type="bool",example="true"),
 *                   )
 *              }
 *          )
 *      ),
 *        @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *                @OA\Property(property="id",type="integer",example="1"),
 *                @OA\Property(property="title",type="string",example="Edited title"),
 *                @OA\Property(property="description",type="string",example="Edited description"),
 *                @OA\Property(property="completed",type="bool",example="true"),
 *                @OA\Property(property="user_id",type="integer",example="1"),
 *                @OA\Property(property="created_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *                @OA\Property(property="updated_at",type="datetime",example="2024-11-06T21:59:37.000000"),
 *         ),
 *        ),
 *    ),
 *
 * @OA\Delete(
 *         path="/api/todos/{todo}",
 *         summary="Удалить задачу",
 *         tags={"ToDo"},
 *        @OA\Parameter(
 *            description="ID задачи",
 *            in="path",
 *            name="todo",
 *            required=true,
 *            example=1,
 *        ),
 *        @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(property="message",type="string",example="done"),
 *         ),
 *        ),
 *    ),
 *
 */
class ToDoController extends Controller
{

}
