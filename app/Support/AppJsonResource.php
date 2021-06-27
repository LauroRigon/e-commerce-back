<?php


namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class AppJsonResource extends JsonResource
{
    public array $availableIncludes = [];

    public array $defaultIncludes = [];

    public Request $request;

    public function toArray($request)
    {
        $this->request = $request;

        $requestIncludes = explode(',', $request->query('include'));
        $includes = array_merge($this->defaultIncludes, array_intersect($this->availableIncludes, $requestIncludes));

        $resourceData = $this->resource($request);

        $resolvedIncludes = $this->resolveIncludes($includes);

        return array_merge($resourceData, $resolvedIncludes);
    }

    private function resolveIncludes(array $includes): array
    {
        $resolvedIncludes = [];
        foreach ($includes as $include) {
            $includeMethodName = "include{$include}";

            if (method_exists($this, $includeMethodName)) {
                $callable = [$this, $includeMethodName];

                $resolvedIncludes[$include] = $callable($this->request);
            }
        }

        return $resolvedIncludes;
    }

    abstract function resource($request);
}
